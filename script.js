
$(document).ready(function(){
   $('#keyword').keyup(function(){
        let input =$(this).val();
        console.log(input);
        if(input != ""){
         $.ajax({
            url:"ajax/buku.php",
            method:"POST",
            data:{input:input},
            
            success:function(data){
               $('#table').html(data);
            }
         })
        }else{
         // $('#table').css("display","none");
        }
   });
});