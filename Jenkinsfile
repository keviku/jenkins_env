node {
  checkout scm
  withEnv([
    'USERNAME=remote',
    'URL=10.241.53.170:9090',
    'JOB=test',
    'ID=remote',
  ]) 
  {  
   withCredentials(
      [
        string(credentialsId: 'key', variable: 'TOKEN')        
      ]
    ) {  
        stage('Deploy') {  
              sh "docker-compose -p test up -d"   
                   

              
       }
     }
    }
}
