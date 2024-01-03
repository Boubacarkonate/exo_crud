pipeline {
    agent any

    stages {
        stage('Run File') {
            steps {
                script {
                    // Utilisez la commande dir pour naviguer dans le répertoire
                    dir('exo_crud') {
                        // Exécute le fichier PHP
                        sh 'cat hello.php'
                    }
                }
            }
        }
    }

    post {
        success {
            // Ajoutez des étapes à exécuter en cas de succès
        }

        failure {
            // Ajoutez des étapes à exécuter en cas d'échec
        }
    }
}

