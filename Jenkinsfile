pipeline{
    agent any
    stages{
        stage('verify version') {
           steps {
            sh 'cat --version'
           } 
        }
        stage('run file') {
            steps {
                sh 'cat hello.php'
            }
        }
    }
} 