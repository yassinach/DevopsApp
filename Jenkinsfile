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
                bat 'composer update'
                bat 'composer install'
            }
        }

        stage('Run Migrations') {
            steps {
                script {
                    // Start Laravel server in the background
                    bat 'start /B php artisan serve --host=127.0.0.1 --port=8000'

                    // Wait for the server to start
                    bat 'ping -n 10 127.0.0.1 > nul'

                    // Run database migrations
                    bat 'php artisan migrate'
                }
            }
        }
    }

     stage('Run Tests') {
            steps {
                // Lancer les tests Laravel
                bat 'php artisan test'
            }
        }
        stage('Run Terraform') {
            steps {
                // Navigate to the Terraform folder
                dir('terraform') {
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

    post {
        success {
            echo "Build completed successfully."
        }
        failure {
            echo "Build failed. Check logs for details."
        }
    }