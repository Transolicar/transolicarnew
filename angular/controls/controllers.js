/*
Controladores del Angular
 */
angular.module("transolicar")


  .controller("slider", ["$scope", "$http", "$rootScope", function($scope, $http, $rootScope) {

    $rootScope.resetear();
    $rootScope.sliactivo = "active";




  }])


  .controller("contacto", ["$scope", "$http", "$rootScope", function($scope, $http, $rootScope) {

    $rootScope.resetear();
    $rootScope.conactivo = "active";



    $scope.msg = "";
    $scope.alerta = "text-danger";




    $scope.enviar = function() {
      $scope.msg = "Espere por favor...";




      var nombre = $rootScope.formaD.nombre;
      var email = $rootScope.formaD.ema;
      var asunto = $rootScope.formaD.asunto;
      var comentario = $rootScope.formaD.comentario;
      var terminos = $rootScope.formaD.terminos;

      if (nombre == null || email == null || asunto == null || comentario == null || !terminos) {

        $scope.alerta = "text-danger";
        $scope.msg = 'Todos los campos son requeridos.';
        return false;

      }



      /* Envío de mensaje */

      var data = {

        nombre: nombre,
        email: email,
        asunto: asunto,
        comentario: comentario

      };

      $http.post("enviar_json.php", JSON.stringify(data))
        .then(function(data) {


          if (data.data == 1) {

            $scope.msg = "Tu mensaje ha sido enviado correctamente.";
            $scope.alerta = "text-success";
            $rootScope.formaD.nombre = "";
            $rootScope.formaD.ema = "";
            $rootScope.formaD.asunto = "";
            $rootScope.formaD.comentario = "";
            $rootScope.formaD.terminos = false;

          } else {

            $scope.msg = "Ha ocurrido un error al enviar.";
            $scope.alerta = "text-danger";

          }


        })
        .catch(function() {

          $scope.msg = "Ha ocurrido un error al enviar.";
          $scope.alerta = "text-danger";

        })






    };


    $scope.validar = function($event) {


      var email = $($event.target).val();


      // Validar campo lleno
      if (email.length < 5) {


        $scope.msg = 'El e-mail debe tener al menos 5 caracteres.';
        $scope.msgemail = "close";
        $scope.alertemail = "text-danger";
        $($event.target).focus();
        return false;
      }


      // Validar una sola arroba
      if (email.indexOf("@") !== email.lastIndexOf("@")) {


        $scope.msg = 'El e-mail debe tener sólo una @.';
        $scope.msgemail = "close";
        $scope.alertemail = "text-danger";
        $($event.target).focus();
        return false;
      }


      // Hallar posiciion del arroba
      var posArroba = email.indexOf("@");

      if (posArroba !== -1) {

        // Primera parte antes del arroba
        var parte1 = email.substr(0, posArroba);





        // Segunda parte despues del arroba
        var parte2 = email.substr(posArroba + 1);



        // Contar caracteres antes y despues del arroba

        if (parte1.length < 1) {


          $scope.msg = 'El e-mail debe tener al menos un caracter antes del signo @';
          $scope.msgemail = "close";
          $scope.alertemail = "text-danger";
          $($event.target).focus();
          return false;
        }

        if (parte1.length < 2) {


          $scope.msg = 'El e-mail debe tener al menos dos caracteres después del signo @';
          $scope.msgemail = "close";
          $scope.alertemail = "text-danger";
          $($event.target).focus();
          return false;
        }


        //contar letras antes y despues del punto del dominio

        var posPunto = parte2.indexOf(".");

        if (posPunto !== -1) {

          // Primera parte despues del arroba antes del primer punto
          var subparte1 = parte2.substr(0, posPunto);





          // Primera parte despues del arroba despues del primer punto
          var subparte2 = parte2.substr(posPunto + 1);


          if (subparte1.length < 2) {


            $scope.msg = 'El dominio del email no puede ser menor a dos caracteres';
            $scope.msgemail = "close";
            $scope.alertemail = "text-danger";
            $($event.target).focus();
            return false;


          }

          if (subparte2.length < 2) {


            $scope.msg = 'La extensión del dominio no puede ser menor a dos caracteres';
            $scope.msgemail = "close";
            $scope.alertemail = "text-danger";
            $($event.target).focus();
            return false;


          }


        } else {


          $scope.msg = 'El e-mail debe finalizar en .com, .net, etc...';
          $scope.msgemail = "close";
          $scope.alertemail = "text-danger";
          $($event.target).focus();
          return false;

        }


        // Validar puntos en dominio

        arreglo = parte2.split(".");

        flag = true;
        for (i = 0; i < arreglo.length; i++) {
          flag = flag & (arreglo[i].length >= 2);
        }

        if (!flag) {


          $scope.msg = 'El e-mail no puede tener dos puntos seguidos y la extensiones mínimo dos caracteres';
          $scope.msgemail = "close";
          $scope.alertemail = "text-danger";
          $($event.target).focus();
          return false;
        }


        // El email no debe iniciar ni finalizar en punto

        if (parte1.indexOf(".") === 0 || parte1.lastIndexOf(".") === parte1.length - 1 || parte2.lastIndexOf(".") === parte2.length - 1) {


          $scope.msg = 'El e-mail no puede comenzar ni finalizar en punto';
          $scope.msgemail = "close";
          $scope.alertemail = "text-danger";
          $($event.target).focus();
          return false;

        }

        // Buscar caracteres permitidos

        var permitidos = ".!#$%&\\’*+-/=?^_`{|}~abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";


        // Validar puntos en dominio



        flag2 = true;
        for (i = 0; i < parte1.length; i++) {
          caracter = parte1.substr(i, 1);
          flag2 = flag2 & (permitidos.indexOf(caracter) !== -1);
        }

        if (!flag2) {


          $scope.msg = 'Sólo está permitido el uso de letras, números y estos caracteres: .!#$%&\\’*+-/=?^_`{|}~';
          $scope.msgemail = "close";
          $scope.alertemail = "text-danger";
          $($event.target).focus();
          return false;
        }







      } else {

        $scope.msg = 'El e-mail debe contener el signo @';
        $scope.msgemail = "close";
        $scope.alertemail = "text-danger";
        $($event.target).focus();
        return false;

      }



      $scope.msg = "";
      $scope.msgemail = "check";
      $scope.alertemail = "text-success";

    };

    $('.btn-local').on("click", function() {

      var ciudad = $(this).attr("data-place");
      var linked = "";

      $('#localidad .modal-title').html("<h2 class='text-uppercase text-center'>" + ciudad + "</h2>");

      switch (ciudad) {

        case 'bucaramanga':
          linked = "https://www.google.com/maps/d/u/0/embed?mid=1Ai2Jxgl_r1FKXLPFBBKDBPywLNo";
          break;

        case 'santa marta':
          linked = "https://www.google.com/maps/d/u/0/embed?mid=1A0FsekjPickNamu7Qpz5-BXLza0";
          break;

        case 'cucuta':
          linked = "https://www.google.com/maps/d/u/0/embed?mid=1o9An3d-kA1_7PbakomY-dQWQJAz2FCAu";
          break;

        case 'barranquilla':
          linked = "https://www.google.com/maps/d/u/0/embed?mid=1Nck7UWbiizw6GyF-X5dDLyOUIRw";
          break;

        case 'cartagena':
          linked = "https://www.google.com/maps/d/embed?mid=1pvB3hqjkIFR9IOjlBTLWR4qBi5AUvA-x&hl=es";
          break;

        case 'bogota':
          linked = "https://www.google.com/maps/d/u/0/embed?mid=1xnl4DATp3mPQr5gzGkWSE4jpEz93o8jX";
          break;

        case 'buenaventura':
          linked = "https://www.google.com/maps/d/u/0/embed?mid=1EbtaNSkN_QtgjT4sp2mEC3x-GwhXAHUL";
          break;

        case 'medellin':
          linked = "https://www.google.com/maps/d/u/0/embed?mid=1WrqZkNHbWNUOzTWP6LyMD3PDhnAMEVNx";
          break;
        case 'Duitama':
          linked = "https://www.google.com/maps/d/u/0/embed?mid=1eoepMcsd67mhDt73jtkfU0Z5t9n_mfxL";
          break;



      }

      $('#localidad .modal-body').html("<iframe src=\"" + linked + "\" class=\"col-md-12\" height=\"480\" frameborder=\"0\"></iframe>");
      $("#localidad").modal("show");


    });


  }])



  /*
  .controller("blog",["$scope","$http","$rootScope","$sanitize", function($scope,$http,$rootScope,$sanitize){

              $rootScope.resetear();
              $rootScope.bloactivo = "active";





  }]) */

  .controller("nosotros", ["$scope", "$http", "$rootScope", "$sce", function($scope, $http, $rootScope, $sce) {

    $rootScope.resetear();
    $rootScope.nosactivo = "active";

    $scope.tab = 1;
    $scope.tab_titulo = "QUIENES SOMOS";
    $scope.tab_texto = "<p>Somos una organizaci&oacuten empresarial constituida en el a&ntildeo 2013, dedicada a la prestaci&oacuten del servicio de transporte de carga terrestre a nivel local, regional y nacional con un portafolio vehicular diverso compuesto por l&iacuteneas como carboneros, carrocer&iacuteas, planchas, cisternas y volteos.</p><p>Gracias al apoyo de la amplia red de colaboradores y respaldo que ofrece el personal de nuestra compa&ntilde&iacutea con m&aacutes de 20 a&ntildeos de experiencia en el medio de transporte, TRANSOLICAR SAS garantiza un servicio &aacutegil, r&aacutepido, oportuno y seguro en el desarrollo de nuestros procesos log&iacutesticos.</p><p>Nuestros servicios est&aacuten soportados por procesos efectivos y por tecnolog&iacutea adecuada. Contamos con un talento humano altamente competente y comprometido con el logro de las metas organizacionales.</p><p>Una de nuestras mayores fortalezas consiste en brindar seguridad en el seguimiento vehicular, a trav&eacutes de personal altamente capacitado y con alianzas estrat&eacutegicas que permiten la localizaci&oacuten autom&aacutetica en tiempo real.</p><p>Nuestra flota est&aacute compuesta por m&aacutes de 500 veh&iacuteculos entre tractocamiones propios y terceros de diversos modelos y marcas. </p>";

    $scope.change_tab = function() {

      if ($scope.tab == 1) {

        $scope.tab = 2;
        $scope.tab_titulo = "MISION Y VISION";
        $scope.tab_texto = "<h3>MISI&OacuteN</h3><p>Estamos comprometidos con prestar un servicio Seguro, oportuno y de Excelente Calidad a costos razonables, haciendo uso &oacuteptimo de nuestros recursos con el en de satisfacer todas y cada una de las necesidades de nuestros clientes.</p><br><h3>VISI&OacuteN</h3><p>Ser una empresa de transporte de carga terrestre reconocida a nivel nacional, cubriendo las principales rutas de nuestro pa&iacutes y a 2020 ampliar nuestra cobertura del servicio a nivel internacional, supliendo las exigencias y expectativas de nuestros clientes, manteniendo costos competitivos en el mercado</p>";
      } else {

        $scope.tab = 1;
        $scope.tab_titulo = "QUIENES SOMOS";
        $scope.tab_texto = "<p>Somos una organización empresarial constituida en el año 2013, dedicada a la prestación del servicio de transporte de carga terrestre a nivel local, regional y nacional con un portafolio vehicular diverso compuesto por líneas como carboneros, carrocerías, planchas, cisternas y volteos.</p><p>Gracias al apoyo de la amplia red de colaboradores y respaldo que ofrece el personal de nuestra compañía con más de 20 años de experiencia en el medio de transporte, TRANSOLICAR SAS garantiza un servicio ágil, rápido, oportuno y seguro en el desarrollo de nuestros procesos logísticos.</p><p>Nuestros servicios están soportados por procesos efectivos y por tecnología adecuada. Contamos con un talento humano altamente competente y comprometido con el logro de las metas organizacionales.</p><p>Una de nuestras mayores fortalezas consiste en brindar seguridad en el seguimiento vehicular, a través de personal altamente capacitado y con alianzas estratégicas que permiten la localización automática en tiempo real.</p><p>Nuestra flota está compuesta por más de 200 vehículos entre tractocamiones propios y ¬delizados de diversos modelos y marcas. </p>";
      }

    }



  }])

  .controller("servicios", ["$scope", "$http", "$rootScope", function($scope, $http, $rootScope) {

    $rootScope.resetear();
    $rootScope.seractivo = "active";





  }])




  .controller("preguntas", ["$scope", "$http", "$rootScope", function($scope, $http, $rootScope) {

    $rootScope.resetear();
    $rootScope.novactivo = "active";

    // Simple GET request example:
    $http({
      method: 'GET',
      url: 'blog.json'
    }).then(function successCallback(response) {

      $scope.entradas = response.data;
      setTimeout(function() {

        carrousel();
      }, 1000);



    }, function errorCallback(response) {

    });

    $scope.blog = {
      "titulo": '',
      "cuerpo": '',
      "galeria": null
    }
    $scope.abierto = 0;
    $scope._entrada = function(num) {
      if ($scope.abierto == 0) {
        $('#entrada').collapse("show");
        $scope.abierto = 1;
      }

      $scope.entradas.forEach(function(ele) {
    
        if (ele.id == num) {
          $scope.blog.id = ele.id;
          $scope.blog.titulo = ele.titulo;
          $scope.blog.cuerpo = ele.cuerpo;
          $scope.blog.galeria = ele.galeria;
        }
      });
    }


  }])
  .controller("clientes", ["$scope", "$http", "$rootScope", function($scope, $http, $rootScope) {

    $rootScope.resetear();
    $rootScope.cliactivo = "active";

    $scope.clientes = [{
        'tipo': 'carbon',
        'empresas': [{
            'empresa': 'yilcoque'
          },
          {
            'empresa': 'trafigura'
          },
          {
            'empresa': 'coquecol'
          }, {
            'empresa': 'bulktrading'
          }, {
            'empresa': 'carbomax'
          }, {
            'empresa': 'minas'
          },
        ]
      },
      {
        'tipo': 'grano',
        'empresas': [{
            'empresa': 'solla'
          },
          {
            'empresa': 'nutryr'
          },
          {
            'empresa': 'galpon'
          },
          {
            'empresa': 'contegral'
          },
          {
            'empresa': 'campollo'
          },
          {
            'empresa': 'santos'
          }, {
            'empresa': 'fabipollo'
          },
          {
            'empresa': 'raza'
          }, {
            'empresa': 'italcol'
          },
        ]
      },
      {
        'tipo': 'hierro y acero',
        'empresas': [{
            'empresa': 'aceros'
          }, {
            'empresa': 'diaco'
          }, {
            'empresa': 'partmo'
          },
          {
            'empresa': 'ternium'
          },
        ]
      },
      {
        'tipo': 'trigo',
        'empresas': [{
            'empresa': 'indupan'
          },
          {
            'empresa': 'coopasan'
          },
          {
            'empresa': 'icoharinas'
          },
          {
            'empresa': 'pardo'
          },
        ]
      },




    ];




  }])

  .controller("politicas", ["$scope", "$http", "$rootScope", "$sanitize", function($scope, $http, $rootScope, $sanitize) {

    $rootScope.resetear();
    $rootScope.polactivo = "active";


  }]).controller("footer",["$scope","$http","$rootScope", function($scope,$http,$rootScope){
    _url ="https://www.instagram.com/transolicarsas/?__a=1";
    $scope._recents = [];   
   data = null;
  $http.get(_url, data)
                           .then(function (data) {
                              data = data.data
                                var _timeline = data['graphql'];
                                        _timeline = _timeline['user'];
                                        _timeline = _timeline['edge_owner_to_timeline_media'];
                                        _timeline = _timeline['edges'];
                                      
                                  for(const prop in _timeline){
                                      _post = _timeline[prop];
                                      var _postRecent = [];
                                      _postRecent['caption'] = _post['node']['edge_media_to_caption']['edges'][0]['node']['text'];
                                      _postRecent['display'] =  _post['node']['display_url'];
                                      _postRecent['url'] = _post['node']['shortcode'];
                                      $scope._recents.push(_postRecent);
                                   }
      
  
  
                          })
                           .catch(function (e) {
  
                             $scope.msg ="Ha ocurrido un error al obtener Instagram."+e;
                             $scope.alerta = "text-danger";
  
                           });
      
      $scope.openurl = function(_index){
      _url = "https://instagram.com/p/"+$scope._recents[_index].url;    
      window.open(_url, '_blank','heigth=600,width=600');   // may alse try $window
  } 
  }]);
  
