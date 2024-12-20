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
                
                bat 'composer update'
                bat 'composer install'
                
            }
        }

        stage('Run Migrations') {
            steps {
                // Appliquer les migrations pour préparer la base de données
                
                
                
                bat 'php artisan serve &'
                
            }
        }

        stage('Run Tests') {
            steps {
                // Lancer les tests Laravel
                
                bat 'php artisan test'
                
            }

        post {
            success {
                echo "build successfuly"
            }
            failure{
                echo "error"
            }
        } 
        }
    }
}
