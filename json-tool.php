<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>JSON Tool</title>

    <!-- Bootstrap core CSS -->
<link href="https://getbootstrap.com/docs/5.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Favicons -->
<meta name="theme-color" content="#7952b3">


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
    </style>

    
    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    
<div class="container">
  <main>
    <div class="py-5 text-center">
      <h2>JSON Tool</h2>
    </div>

    <div class="row g-5">
      <div class="col-md-6 col-lg-6 offset-lg-3">
        <form class="needs-validation" novalidate>
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">Key</label>
              <input type="text" list="key-list-options" class="form-control" id="jsonKey" placeholder="" value="" required>
              <datalist id="key-list-options">
              </datalist>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Value</label>
              <input type="text" list="value-list-options" class="form-control" id="jsonValue" placeholder="" value="" required>
              <datalist id="value-list-options">
              </datalist>
            </div>

          </div>
          <hr class="my-4">
          <button class="w-100 btn btn-primary btn-lg add-to-json-btn" type="button">Add to JSON</button>
          
          <div class="keys-container my-3">
            
          </div>

          <hr class="my-4">
          
          <code class="json-code-container">
            
          </code>
          
          
        </form>
      </div>
    </div>
  </main>

</div>


    <script src="https://getbootstrap.com/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
    <script>
    
      let jsonObj = {};
      
      let keyOptions = {
        a: ['1','2','3'],
        b: ['4','52','35'],
        c: ['61','72','38'],
      };
      let jsonKey = document.getElementById('jsonKey');
      let jsonValue = document.getElementById('jsonValue');
      let valueListOptions = document.getElementById('value-list-options');
      let keyListOptions = document.getElementById('key-list-options');
      let addToJsonBtn = document.querySelector('.add-to-json-btn');
      let jsonCodeContainer = document.querySelector('.json-code-container');
      let keysContainer = document.querySelector('.keys-container');
      jsonCodeContainer.innerHTML = JSON.stringify(jsonObj);
      
      
      
      let createOptions = function(list, param = 'key'){
        let optionStr = '';
        if(param == 'key'){
          for(let i in list){
            optionStr += '<option value="'+i+'">';
          }
          keyListOptions.innerHTML = optionStr;
        }else{
          list.forEach(function(el, i){
            optionStr += '<option value="'+el+'">';
          })
          valueListOptions.innerHTML = optionStr;
        }
      }
      
      createOptions(keyOptions);

      jsonKey.addEventListener('change', function(){
        valueListOptions.innerHTML = '';
        if(typeof(keyOptions[this.value]) !== 'undefined'){
          createOptions(keyOptions[this.value], 'value');
        }
      });

      addToJsonBtn.addEventListener('click', function(){
        let kval = jsonKey.value.trim();
        if(kval == ''){
          alert('Key is required');
          return false;
        } 
        if(typeof(jsonObj[jsonKey.value]) !== 'undefined'){
          alert('Duplicated key');
          return false;
        }
        
        jsonObj[kval] = jsonValue.value.trim();
        let keyBtn = document.createElement('button');
        keyBtn.classList.add('btn', 'btn-danger','mr-1', 'mb-1', 'd-block');
        keyBtn.type = 'button';
        keyBtn.dataset.kval = kval;
        keyBtn.onclick = function(ev) {
          delete jsonObj[this.dataset.kval];
          jsonCodeContainer.innerHTML = JSON.stringify(jsonObj);
          this.remove();
        };
        keyBtn.innerHTML = kval + ` ⨉`;
        keysContainer.append(keyBtn);
//         let jsonStr = '{';
//         for(let i in jsonObj){
//           jsonStr += '"'+i+'":"'+jsonObj[i]+'"'+'\n';
//         }
//         jsonStr = '{';
        jsonCodeContainer.innerHTML = JSON.stringify(jsonObj);
      });
      
    
    </script>
  </body>
</html>
