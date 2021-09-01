  $(document).ready(function() {
      get_control_data();
     get_avg();
      get_control_data();
      get_control_data();
      get_user_input();
      print();
   });
     
  // function cek_fan() {
  //   setTimeout(function() {
  //     get_fan_data();
  //   }, 2000);
  // }

     


     function print(){
    console.log('data_fan = ' +data_fan);
    console.log('data_mist = ' +data_mist);
    console.log("data_pump = "+data_pump);
     }


    var data_fan;
    var data_pump;
    var data_mist;

    function get_user_input(){
      $(".spinner-border").hide();
    var fancheckBox = document.getElementById("fan");
    // var text = document.getElementById("text");
    if (fancheckBox.checked == true){
        data_fan=1;
    } else {
       data_fan=0;
    }
    var pumpcheckBox = document.getElementById("pump");
    // var text = document.getElementById("text");
    if (pumpcheckBox.checked == true){
        data_pump=1;
    } else {
       data_pump=0;
    }
    var mistcheckBox = document.getElementById("mist");
    // var text = document.getElementById("text");
    if (mistcheckBox.checked == true){
        data_mist=1;
    } else {
       data_mist=0;
    }

    }


    var fan = 'fan';
    var mist = 'mist';
    var pump = 'pump';


  function change_function(tmp){

      var checkBox = document.getElementById(tmp);
      var cur_data;
      var data_now;

      if(tmp == 'fan'){
        $(".fan-box").hide();
        $(".spinner-border").show();
        cek_konfirmasi();
        cur_data = data_fan;
      } else if(tmp == 'pump'){
        cur_data = data_pump;
      } else if(tmp == 'mist'){
        cur_data = data_mist;
      }

      if (checkBox.checked){
        data_now =1;
      } else {
        data_now =0;
      }

      console.log(tmp);
      console.log(tmp +"checkBox = " +checkBox);
      console.log(tmp +"_now = " +data_now);
      console.log("data "+tmp+" = " +cur_data);

      if (data_now != cur_data){
        console.log("data "+tmp+" telah berubah menjadi : " +data_now);
        if(tmp == 'fan'){k
          data_fan = data_now;
        } else if(tmp == 'pump'){
          data_pump = data_now;
        } else if(tmp == 'mist'){
          data_mist = data_now;
        }
      }else{
        console.log(tmp +" gagal");
      }
      print();
      inset_data();

    }


    function cek_konfirmasi(){
      console.log('cek_konfirmasi()');
      $.getJSON('cek_konfirmasi.php', function(data) {
        var tmpkonfirmasi;
        tmpkonfirmasi = data.id;
        console.log('tmpkonfirmasi 01= '+tmpkonfirmasi);
        var i =0;
        do{
          $.getJSON('cek_last_control.php', function(data) {
              console.log('tmpkonfirmasi 02= ' +tmpkonfirmasi);
            });
          i++;
        }
        while(i<100000);
      });
    }



    function inset_data(){
      $.ajax({
      url: 'inset_data_control.php',
      type: 'POST',
      data: { "fan" : data_fan, "pump" : data_pump, "mist" : data_mist},
      success: function (result){
        console.log(result);
        console.log('Berhasil input data baru');
        print();
      }
      });
    }

    



  function get_control_data(){
    $.getJSON('cek_last_control.php', function(data) {
        if(data.fan == 1){
          checkfan();
        }else if (data.fan == 0){
          uncheckfan();
        }else{
        }
        if(data.mist == 1){data_mist =1;
          checkmist();
        }else if (data.mist == 0){
          uncheckmist();
        }else{
        }
        if(data.pump == 1){
          checkpump();
        }else if (data.pump == 0){
          uncheckpump();
        }else{
        }
      });
  }
 





  function checkfan() {
    // $('.custom-control-label').text('ON');
    document.getElementById("fan").checked = true;
  }

  function uncheckfan() {
     // $('.custom-control-label').text('OFF');
    document.getElementById("fan").checked = false;
  }

  function checkpump() {
    // $('.custom-control-label').text('ON');
    document.getElementById("pump").checked = true;
  }

  function uncheckpump() {
     // $('.custom-control-label').text('OFF');
    document.getElementById("pump").checked = false;
  }

   function checkmist() {
    // $('.custom-control-label').text('ON');
    document.getElementById("mist").checked = true;
  }

  function uncheckmist() {
     // $('.custom-control-label').text('OFF');
    document.getElementById("mist").checked = false;
  }



// GET AVG DATA

  function get_avg(){
    $.getJSON('get_avg.php', function(data) {
        var tempavg0d  = data.tempavg0d;
        var tempavg1d  = data.tempavg1d;  
        var tempavg6d  = data.tempavg0d; 
        var tempavg29d  = data.tempavg29d; 

        var humavg0d  = data.humavg0d; 
        var humavg1d  = data.humavg1d;
        var humavg6d  = data.humavg6d; 
        var humavg29d  = data.humavg29d; 
           
        var tempoutavg0d  = data.tempoutavg0d; 
        var tempoutavg1d  = data.tempoutavg1d; 
        var tempoutavg6d  = data.tempoutavg6d; 
        var tempoutavg29d  = data.tempoutavg29d; 
           
        var humoutavg0d  = data.humoutavg0d; 
        var humoutavg1d  = data.humoutavg1d; 
        var humoutavg6d  = data.humoutavg6d; 
        var humoutavg29d  = data.humoutavg29d; 


        console.log('tempavg0d');
        console.log(tempavg0d);

        // $(".ultemperature").html('<li>Yesterday Avg: ' +tempavg0d+'°C</li>');
    $(".ultemperature").html('<li>Yesterday : ' +tempavg1d+'°C</li>'
                                 +'<li>Today Avg: ' +tempavg0d+'°C</li>'
                                 +'<li>Week Avg: ' +tempavg6d+'°C</li>'
                                 +'<li>Month Avg: ' +tempavg29d+'°C</li>');

    $(".ulhumidity").html('<li>Yesterday : ' +humavg1d+'%</li>'
                                 +'<li>Today Avg: ' +humavg0d+'%</li>'
                                 +'<li>Week Avg: ' +humavg6d+'%</li>'
                                 +'<li>Month Avg: ' +humavg29d+'%</li>');

    $(".ultemperatureout").html('<li>Yesterday : ' +tempoutavg1d+'°C</li>'
                                 +'<li>Today Avg: ' +tempoutavg0d+'°C</li>'
                                 +'<li>Week Avg: ' +tempoutavg6d+'°C</li>'
                                 +'<li>Month Avg: ' +tempoutavg29d+'°C</li>');

    $(".ulhumidityout").html('<li>Yesterday : ' +humoutavg1d+'%</li>'
                                 +'<li>Today Avg: ' +humoutavg0d+'%</li>'
                                 +'<li>Week Avg: ' +humoutavg6d+'%</li>'
                                 +'<li>Month Avg: ' +humoutavg29d+'%</li>');



      });
  }