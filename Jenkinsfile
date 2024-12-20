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
                sh 'composer install'
                sh 'npm install && npm run dev'
            }
        }

        stage('Run Migrations') {
            steps {
                // Appliquer les migrations pour préparer la base de données
                sh 'php artisan migrate'
            }
        }

        stage('Run Tests') {
            steps {
                // Lancer les tests Laravel
                sh 'php artisan test'
            }
        }
    }
}
