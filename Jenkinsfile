pipeline{
    agent any
    stages{
        stage('verify version') {
           steps {
            sh 'php --version'
           } 
        }
        stage('run file') {
            steps {
                sh 'php index.php'
            }
        }
    }
} 