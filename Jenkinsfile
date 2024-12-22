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
                // bat 'composer update'
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

    post {
        success {
            echo "Build completed successfully."
        }
        failure {
            echo "Build failed. Check logs for details."
        }
    }
}
