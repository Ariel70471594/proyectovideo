var app=angular.module('clinica',['ui.router']);
app.controller('servicio',function($scope,$http){
     $scope.especialidad1={};
   /* $scope.onclickEnviar=function(){
        console.log($scope.especialidad1);
        re=$scope.especialidad1;
        $http.post('/clinica/apicrearespecialidad',re).then(function(server){
            if(server.data.estado==1){
                cargar_especialidad();
            }
        });
    }*/
   /* $scope.onclickEnviarMedico=function(){
        console.log($scope.medico.especialidad);
       // re=$scope.especialidad1;
       //$scope.medico.id_especialidad=$scope.especialidad.id;
        $http.post('/clinica/apicrearmedico',$scope.medico).then(function(server){
            if(server.data.estado==1){
               // cargar_especialidad();
            }
        });
    }*/
    function cargar(){
        $http.get('/videos/cargar').then(function(server){
            //el parametro server, es lo que el servidor devolvio
            //visualiza en la consola del navegador la variable server
           // console.log(server);
            //en server.data se encuentra los datos que fuen mandado desde 
            //el servidos al cliente
            //console.log(server.data);
            if(server.data.estado==1)
                $scope.lista=server.data.lista;
            else
                alert("Error en el server"+server.data.error);
        });
            
    }

    cargar();
    /*function cargar_especialidad(){
        $http.get('/clinica/getespecialidad').then(function(server){
            if(server.data.estado==1)
                $scope.especialidad=server.data.lista;
            else
                alert("Error en el server"+server.data.error);
        });
    }
    cargar_especialidad();
*/
});
app.config(function($stateProvider){
    $stateProvider
    .state('nuevoEspecialidad',{
        views:{
            'contenido':{
                templateUrl:'/clinica/crearEspecialidad',
            }
        }
    })
    .state('button',{
        views:{
            'contenido':{
                template:'<button  class="btn btn-succes" ui-sref="nuevoEspecialidad" >nuevo</button>',
            }
        }
    });

});