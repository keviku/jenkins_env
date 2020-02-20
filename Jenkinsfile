node {
  checkout scm
  withEnv([
    'USERNAME=remote',
    'URL=10.241.53.170:9090',
    'JOB=test',
    'ID=remote',
    'TEST2=TEST2'
  ]) 
  {  
   withCredentials(
      [
        string(credentialsId: 'key', variable: 'TOKEN'),
        string(credentialsId: 'test2', variable: 'TOKEN2')  
      ]
    ) {  
        stage('Deploy') {  
              sh "docker-compose -p test up -d"   
                   

              
       }
     }
    }
}
