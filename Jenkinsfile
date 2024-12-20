pipeline {
    agent any

    stages {
        stage('Clone Repository') {
            steps {
                // Clone le dépôt Akaunting
                git 'https://github.com/yassinach/DevopsApp.git'
            }
        }

        stage('Install Dependencies') {
            steps {
                // Installer les dépendances PHP et JavaScript
                powershell '''
                composer update
                composer install
                '''
            }
        }

        stage('Run Migrations') {
            steps {
                // Appliquer les migrations pour préparer la base de données
                powershell '''
                php artisan key:generate
                php artisan migrate
                php artisan serve
                '''
            }
        }

        stage('Run Tests') {
            steps {
                // Lancer les tests Laravel
                powershell '''
                php artisan test
                '''
            }
        }
    }
}
