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
                // Appliquer les migrations

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
                        bat 'echo %PATH%'
                        bat 'terrascan version' 
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
