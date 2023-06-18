<!DOCTYPE html>
<html lang="en">
  <head>
    <title>All List</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5">
    <div class="alert " id="alert">
  
</div>
<h1 class="text-center mb-4">Bangladesh Location Finding</h1>
      <div class="row">
        <div class="col-md-8 mx-auto">
          
            <div class="row">
                <div class="col-md-4">
                <div class="form-group">
              <label for="divisions">Divisions:</label>
              <select class="form-control" id="divisions" required>
               
              </select>
            </div>
                </div>
                <div class="col-md-4">
                <div class="form-group">
              <label for="districts">Districts:</label>
              <select class="form-control" id="districts" required>
                <option value="">Select District</option>
              </select>
            </div>
                </div>
                <div class="col-md-4">
                <div class="form-group">
              <label for="thana">Pourosova/City:</label>
              <select class="form-control" id="thana" required>
                <option value="">Select Thana</option>
              </select>
            </div>
                </div>
            </div>
        </div>
      </div>
      <table class="table" id="dataTable">
    
  </table>
    </div>

    <!-- Optional JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
<script src="js/fetch.js"></script>
<script>
  //divisions
  let alertTop=document.getElementById('alert');
  alertTop.style.display="none";
  let div=document.getElementById("divisions");
  let dis=document.getElementById("districts");
  let thana=document.getElementById("thana");
//fetch divisions
  fetch('<?=site_url('/api/divisions')?>')
  .then(res=>res.json())
  .then((data)=>{
       // console.log(data);
        if(data.success==true)
        {
          let payload=data.msg;
          let html='<option value="">Select Division</option>';
           payload.forEach(function(item){
             // console.log(item);
              html+=`<option value=${item.id}>${item.en_name}</option>`
           });

           div.innerHTML=html;
          load(payload,'div');
        }
  })
  .catch(err=>{
    console.log(err);
  });
   
  
  div.addEventListener('change',function(){
    console.log(div)
   //fetch districts
   fetch('<?=site_url('/api/division-to-districts/')?>'+this.value)
   .then(res=>res.json())
   .then(data=>{
      console.log(data.msg);
      let html='';
      data.msg.forEach(function(item){
         html+=`<option value=${item.id}>${item.en_name}</option>`;
      });
      dis.innerHTML=html;
      load(data.msg,'dis');
   }).catch(err=>console.log(err))
  });

  dis.addEventListener('change',function(){
   //console.log(this.value);
   //fetch districts
   fetch('<?=site_url('/api/district-to-thana/')?>'+this.value)
   .then(res=>res.json())
   .then(data=>{
      console.log(data.msg);
      let html='';
      data.msg.forEach(function(item){
         html+=`<option value=${item.id}>${item.en_name}</option>`;
      });
      thana.innerHTML=html;
      load(data.msg,'thana');
   }).catch(err=>console.log(err))
  });

  thana.addEventListener('change',function(){
   //console.log(this.value);
   //fetch districts
   fetch('<?=site_url('/api/thana-to-unions/')?>'+this.value)
   .then(res=>res.json())
   .then(data=>{
    
      load(data.msg,'ward');
   }).catch(err=>console.log(err))
  });

 

  function load(res,type)
  {
      console.log(res);
      
            var table=document.getElementById('dataTable');
            table.innerHTML='';
            let html=`<thead class="thead-light">
      <tr>
        <th>SL.</th>
        <th>English</th>
        <th>Bangla</th>
      </tr>
    </thead>
    <tbody>`;
       let sl=1;
        res.forEach(function(item){
            html+=`<tr>
        <td>${sl}</td>
        <td>${item.en_name}</td>
        <td>${item.bn_name}</td>
      </tr>`;
      sl++;
        });
        html+=`</tbody></table>`;

        table.innerHTML=html;
       
  }
</script>
