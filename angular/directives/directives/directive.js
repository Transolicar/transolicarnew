angular.module("transolicar")

.directive('menu', function() {
  return {
    templateUrl: 'angular/templates/menu.html'
  };
})
.directive('foot', function() {
  return {
    templateUrl: 'angular/templates/footer.html',
    controller: 'footer'
  };
})
.directive('contacto', function() {
  return {
    templateUrl: 'angular/templates/contacto.html',
    controller: 'contacto'
  };
})
.directive('nosotros', function() {
  return {
    templateUrl: 'angular/templates/nosotros.html',
    controller: 'nosotros'
  };
})
.directive('slider', function() {
  return {
    templateUrl: 'angular/templates/slider.html',
    controller: 'slider'
  };
})
.directive('servicios', function() {
  return {
    templateUrl: 'angular/templates/servicios.html',
    controller: 'servicios'
  };
})
.directive('preguntas', function() {
  return {
    templateUrl: 'angular/templates/preguntas.html',
    controller: 'preguntas'
  };
})
.directive('clientes', function() {
  return {
    templateUrl: 'angular/templates/clientes.html',
    controller: 'clientes'
  };
}).directive('galeria', function() {
  return {
    templateUrl: 'angular/templates/galeria.html',
    controller: 'galeria'
  };
})
.directive('politicas', function() {
  return {
    templateUrl: 'angular/templates/politicas.html',
    controller: 'politicas'
  };
});
