  // INICIALIZA AS MÁSCARAS

  $('#price').mask("###0,00", {
      reverse: true
  });
  $('#qtd').mask("###0,000", {
      reverse: true
  });
  $('#unit_measurement').on('change', function() {
      document.getElementById('qtd').value = ''
      if (document.getElementById('unit_measurement').value == '1') {
          $('#qtd').mask("###0,000", {
              reverse: true
          });
          document.getElementById('type-qtd').innerHTML = 'lt';
          return
      }
      if (document.getElementById('unit_measurement').value == '2') {
          $('#qtd').mask("###0,000", {
              reverse: true
          });
          document.getElementById('type-qtd').innerHTML = 'Kg';
          return
      }
      $('#qtd').mask("#", {
          reverse: true
      });
      document.getElementById('type-qtd').innerHTML = 'un';
      return
  });

  function checkForm() {
      var product_perishable = document.getElementById('product_perishable').value;
      if (product_perishable == '2') {
          if (document.getElementById('date_validate').value == '' || document.getElementById('date_manufacturing').value == '') {
              notify('Informe a data de validade e a data de fabricação', 'error');
              return false;
          }
          if (document.getElementById('date_validate').value < document.getElementById('date_manufacturing').value) {
              notify('Data de validade deve ser maior que a data de fabricação', 'error');
              return false;
          }
          if ((document.getElementById('date_validate').value < new Date().toLocaleDateString('en-CA') || document.getElementById('date_manufacturing').value > new Date().toLocaleDateString('en-CA'))) {
              notify('Data de validade e fabricação devem ser maiores ou iguais a data de hoje', 'error');
              return false;
          }
      }
      if (document.getElementById('date_manufacturing').value > new Date().toLocaleDateString('en-CA')) {
          notify('Data de fabricação deve ser menor que a data de hoje', 'error');
          return false;
      }
  }