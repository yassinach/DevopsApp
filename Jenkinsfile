pipeline {
    agent any
    environment {
        PATH = "C:\\php;C:\\ProgramData\\ComposerSetup\\bin;${env.PATH}"
        PATH = "C:\\php-8.2.26;C:\\ProgramData\\ComposerSetup\\bin;${env.PATH}"
    }
    stages {
        stage('Clone Repository') {
            steps {
                // Clone le dépôt Akaunting
                git 'https://github.com/yassinach/DevopsApp.git'
            }
        }

        stage('Install Dependencies') {
            steps {
                // Installer les dépendances PHP
                bat 'composer update'
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
