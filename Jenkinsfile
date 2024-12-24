pipeline {
    agent any 

    stages {
        stage('Clone Repository') {
            steps {
                // Clone the repository
                git 'https://github.com/yassinach/DevopsApp.git'
            }
        }

        stage('Install Dependencies') {
            steps {
                // Install PHP dependencies using Composer
                bat 'composer install'
            }
        }

        stage('Run Migrations') {
            steps {
                // Démarrer le serveur Laravel en arrière-plan
                bat 'start /B php artisan serve --host=127.0.0.1 --port=8000'
                // Ajouter une pause pour s'assurer que le serveur est bien démarré
                bat 'ping -n 10 127.0.0.1 > nul'
                
            }
        }

        

        stage('Run Docker Compose') {
            steps {
                script {
                    // Ensure Docker is running
                    bat 'docker --version'

                    // Start Docker Compose
                    bat 'docker-compose up -d'

                    // Verify Docker containers are running
                    bat 'docker ps'
                }
            }
        }

        stage('Run Terraform') {
            steps {
                dir('terraform') {
                    script {
                        // Vérifier que Terraform est installé et accessible
                        bat 'terraform --version'
                        // Initialize Terraform
                        bat 'terraform init'

                        // Validate the configuration
                        bat 'terraform validate'

                        // Plan the configuration
                        bat 'terraform plan'

                        // Apply the configuration (auto-approve for CI/CD)
                        bat 'terraform apply -auto-approve'
                    }
                }
            }
        }

        stage('Run Terrascan') {
            steps {
                dir('terraform') {
                    script {
                        // Lancer l'analyse Terrascan
                        bat 'terrascan version' 
                        bat 'terrascan scan -i terraform'
                    }
                }
            }
        }

        stage('Deploy to Kubernetes') {
            steps {
                script {
                    // Define the Kubernetes context
                    def kubeConfigPath = 'C:\\Users\\anoua\\.kube\\config' // Adjust the path to your kubeconfig

                    // Apply Kubernetes configurations
                    withEnv(["KUBECONFIG=${kubeConfigPath}"]) {
                        // Replace 'kubectl apply' command to use your YAML deployment file
                        bat 'kubectl apply -f kubernetes/akaunting-deployment.yaml'
                        bat 'kubectl apply -f kubernetes/mysql-deployment.yaml'

                        // Verify the deployment
                        bat 'kubectl get pods'
                        bat 'kubectl get services'
                    }
                }
            }
        }
    }

    post {
        success {
            echo "Build completed successfully."
        }
        failure {
            echo "Build failed. Check logs for details."
        }
    }
}
