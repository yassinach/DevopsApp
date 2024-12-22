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
                    // Run database migrations
                    bat 'php artisan migrate'
                }
            }
        }

        stage('Run Tests') {
            steps {
                // Run Laravel tests
                bat 'php artisan test'
            }
        }

        stage('Run Terraform') {
            steps {
                dir('terraform') {
                    script {
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
