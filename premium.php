<?php include("cabacera.php"); ?>
<script src="https://www.paypal.com/sdk/js?&currency=MXN"></script>
<style>
  .bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
  }

  @media (min-width: 768px) {
    .bd-placeholder-img-lg {
      font-size: 3.5rem;
    }
  }

  .b-example-divider {
    height: 3rem;
    background-color: rgba(0, 0, 0, .1);
    border: solid rgba(0, 0, 0, .15);
    border-width: 1px 0;
    box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
  }

  .b-example-vr {
    flex-shrink: 0;
    width: 1.5rem;
    height: 100vh;
  }

  .bi {
    vertical-align: -.125em;
    fill: currentColor;
  }

  .nav-scroller {
    position: relative;
    z-index: 2;
    height: 2.75rem;
    overflow-y: hidden;
  }

  .nav-scroller .nav {
    display: flex;
    flex-wrap: nowrap;
    padding-bottom: 1rem;
    margin-top: -1px;
    overflow-x: auto;
    text-align: center;
    white-space: nowrap;
    -webkit-overflow-scrolling: touch;
  }
</style>
<body>

<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check" viewBox="0 0 16 16">
    <title>Check</title>
    <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
  </symbol>
</svg>

<div class="container py-3">
  <header>
    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
      <h1 class="display-4 fw-normal">Precios</h1>
      <p class="fs-5 text-muted">Se parte de los vendedores en PYMMarket, checa nuestra tabla de precios y elige el que mas te convenga.</p>
    </div>
  </header>

  <main>
    <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm">
          <div class="card-header py-3">
            <h4 class="my-0 fw-normal">Novato</h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title">$99.99<small class="text-muted fw-light">/mo</small></h1>
            <ul class="list-unstyled mt-3 mb-4">
              <li>5 Publicaciones de productos</li>
              <li>Atencion al cliente</li>
              <li>3 Publicaciones de servicios</li>
              <li>Help center access</li>
            </ul>
            <button class="w-100 btn btn-lg btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1">Comprar Plan Novato</button>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm">
          <div class="card-header py-3">
            <h4 class="my-0 fw-normal">Pro</h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title">$299.99<small class="text-muted fw-light">/mo</small></h1>
            <ul class="list-unstyled mt-3 mb-4">
              <li>20 Publicaciones de productos</li>
              <li>10 Publicaciones de servicios</li>
              <li>Prioridad publicitaria nivel 1</li>
              <li>Help center access</li>
            </ul>
            <button class="w-100 btn btn-lg btn-primary"  data-bs-toggle="modal" data-bs-target="#exampleModal2">Comprar Plan Pro</button>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm border-primary">
          <div class="card-header py-3 text-bg-primary border-primary">
            <h4 class="my-0 fw-normal">Empresa</h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title">$599.99<small class="text-muted fw-light">/mo</small></h1>
            <ul class="list-unstyled mt-3 mb-4">
              <li>Publicaciones de productos ilimitado</li>
              <li>Publicaciones de servicios 15</li>
              <li>Prioridad publicitaria nivel 2</li>
              <li>Help center access</li>
            </ul>
            <button class="w-100 btn btn-lg btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal3">Comprar Plan Empresarial</button>
          </div>
        </div>
      </div>
    </div>

    <h2 class="display-6 text-center mb-4">Compara nuestros planes</h2>

    <div class="table-responsive">
      <table class="table text-center">
        <thead>
          <tr>
            <th style="width: 34%;"></th>
            <th style="width: 22%;">Novato</th>
            <th style="width: 22%;">Pro</th>
            <th style="width: 22%;">Empresas</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row" class="text-start">Public</th>
            <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
            <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
            <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
          </tr>
          <tr>
            <th scope="row" class="text-start">Private</th>
            <td></td>
            <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
            <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
          </tr>
        </tbody>

        <tbody>
          <tr>
            <th scope="row" class="text-start">Permissions</th>
            <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
            <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
            <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
          </tr>
          <tr>
            <th scope="row" class="text-start">Sharing</th>
            <td></td>
            <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
            <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
          </tr>
          <tr>
            <th scope="row" class="text-start">Unlimited members</th>
            <td></td>
            <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
            <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
          </tr>
          <tr>
            <th scope="row" class="text-start">Extra security</th>
            <td></td>
            <td></td>
            <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
          </tr>
        </tbody>
      </table>
    </div>
  </main>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Plan Novato</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <h3 class="fs-5">Costo de $99.99 MXN</h3>
          <div class="paypal-button-container"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
    <!-- Modal -->
  <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Plan Pro</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <h3 class="fs-5">Costo de $299.99 MXN</h3>
          <div class="paypal-button-pro"></div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
    <!-- Modal -->
  <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel2">Plan Enterprise</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <h3 class="fs-5">Costo de $599.99 MXN</h3>
          <div class="paypal-button-enterprise"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger " data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  paypal.Buttons({
    style: {
      color:'black',
      label: 'pay'
    },
    createOrder: function(data,actions){
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: 99.99
          }
        }]
      });
    },
    onApprove: function(data,actions){
      actions.order.capture().then(function(detalles){
        window.location.href="helpers/success/successNovato.php";
      });
    },
    onCancel: function(data){
      window.location.href="error.php";
    }
  }).render('.paypal-button-container');
</script>

<script>
  paypal.Buttons({
    style: {
      color:'black',
      label: 'pay'
    },
    createOrder: function(data,actions){
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: 299.99
          }
        }]
      });
    },
    onApprove: function(data,actions){
      actions.order.capture().then(function(detalles){
        window.location.href="helpers/success/successPro.php";
      });
    },
    onCancel: function(data){
      window.location.href="error.php";
    }
  }).render('.paypal-button-pro');
</script>

<script>
  paypal.Buttons({
    style: {
      color:'black',
      label: 'pay'
    },
    createOrder: function(data,actions){
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: 599.99
          }
        }]
      });
    },
    onApprove: function(data,actions){
      actions.order.capture().then(function(detalles){
        window.location.href="helpers/success/successEnterprise.php";
      });
    },
    onCancel: function(data){
      window.location.href="error.php";
    }
  }).render('.paypal-button-enterprise');
</script>


<?php include("pie.php"); ?>
