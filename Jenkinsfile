pipeline {
    agent any
    environment {
        PATH = "C:\\php-8.2.26;C:\\ProgramData\\ComposerSetup\\bin;${env.PATH}"
    }
    stages {
        stage('Clone Repository') {
            steps {
                // Clone the repository
                git 'https://github.com/yassinach/DevopsApp.git'
            }
        }
        stage('Install Dependencies') {
            steps {
                // Install PHP dependencies
                bat 'composer --version'
                bat 'php -v'
                bat 'composer update'
                bat 'composer install'
            }
        }
        stage('Run Migrations') {
            steps {
                // Run Laravel server and migrations
                bat 'start /B php artisan serve --host=127.0.0.1 --port=8000'
                // Ajouter une pause pour s'assurer que le serveur est bien démarré
                bat 'timeout /T 10'
                // Appliquer les migrations
                bat 'php artisan migrate'
            }
        }

        stage('Run Tests') {
            steps {
                // Lancer les tests Laravel
                bat 'php artisan test'
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
