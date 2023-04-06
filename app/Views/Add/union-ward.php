<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Add New Thana</title>
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
      <div class="row">
        <div class="col-md-6 mx-auto">
          <h1 class="text-center mb-4">Add New Thana</h1>
          <form id="wardAdd">
            <div class="form-group">
              <label for="divisions">Divisions:</label>
              <select class="form-control" id="divisions" required>
               
              </select>
            </div>
            <div class="form-group">
              <label for="districts">Districts:</label>
              <select class="form-control" id="districts" required>
                <option value="">Select District</option>
              </select>
            </div>
            <div class="form-group">
              <label for="thana">Pourosova/City:</label>
              <select class="form-control" id="thana" required>
                <option value="">Select Thana</option>
              </select>
            </div>
            <div class="form-group">
              <label for="ward-en">Ward No or Union:</label>
              <input type="text" class="form-control" id="ward-en" required placeholder="Enter Thana Name" />
            </div>
            <div class="form-group">
              <label for="ward-bn">Ward No or Union Bengali:</label>
              <input type="text" class="form-control" id="ward-bn" pattern="[\u0980-\u09FF\s]*" required placeholder="বাংলাতে থানার নাম লিখুন" />
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
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
              html+=`<option value=${item.div_id}>${item.bn_name}</option>`
           });

           div.innerHTML=html;

        }
  })
  .catch(err=>{
    console.log(err);
  });

  div.addEventListener('change',function(){
   //console.log(this.value);
   //fetch districts
   fetch('<?=site_url('/api/division-to-districts/')?>'+this.value)
   .then(res=>res.json())
   .then(data=>{
      console.log(data.msg);
      let html='';
      data.msg.forEach(function(item){
         html+=`<option value=${item.dis_id}>${item.bn_name}</option>`;
      });
      dis.innerHTML=html;
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
         html+=`<option value=${item.thana_id}>${item.bn_name}</option>`;
      });
      thana.innerHTML=html;
   }).catch(err=>console.log(err))
  });

  let form =document.getElementById("wardAdd");
  form.addEventListener('submit',function(e){
         e.preventDefault();
         let thanaId=thana.value;
         let enName=document.getElementById("ward-en").value;
         let bnName=document.getElementById('ward-bn').value;

         if(thanaId==""||enName==""||bnName=="")
         {
            alert('All fields requireds');
         }else{
          var data={
            thana_id:thanaId,
            en_name:enName,
            bn_name:bnName,
          }

         // console.log(data);
           
          fetch('<?=site_url('/api/create-union-ward')?>',{
            method:"POST",
            headers:{
              "Content-Type":"application/json",
            },
            body:JSON.stringify(data),
          }).then(res=>res.json())
          .then(res=>{
            console.log(res);
            if(res.success==true)
            {
                 alertTop.innerHTML= `<strong>Success!</strong> ${res.msg}`;
                 alertTop.classList.add('alert-success');
                 alertTop.classList.remove('alert-danger');
            }else{
              alertTop.innerHTML= `<strong>Success!</strong> ${res.msg}`;
              alertTop.classList.add('alert-danger');
                 alertTop.classList.remove('alert-success');
            }
            alertTop.style.display="block";
            setTimeout(function(){
              alertTop.style.display="none";
            },3000);

          })
          .catch(err=>console.log(err));

         }


  });
</script>
