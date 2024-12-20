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
                
                
            }
        }

        stage('Run Migrations') {
            steps {
                // Appliquer les migrations pour préparer la base de données
                
                sh 'php artisan serve'
                
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
