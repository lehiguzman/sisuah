// Call the dataTables jQuery plugin
$(document).ready(function() {    
  $('#dataTable').DataTable(
  		{
        	"language": 
        		{
            		"url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        		},
        	"columnDefs": 
        	[
            	{
                	//"targets": [ 4,5 ],
                	//"visible": true,
                	//"orderable": false                	
            	}
        	],
        	//"paging":   false,        	
        	//"info":     false,
        	//"scrollY":        "200px",
        	//"scrollCollapse": true,
        	//"paging":         false
        	"dom": '<"top"fi>t<"bottom"lp><"clear">'
    	}
  		);
  

  ///////////////////////////////////AJAX////////////////////////////////////////////////
  $.ajaxSetup({
    headers: 
    {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
        });

  $('#tipo').change(function(e){ 

        e.preventDefault();        
        var tipo = $("select[name=tipo]").val();                    
          if(tipo == '3')
          {
                $.ajax({                    
                    url: '/ajaxRequest',
                    type: 'POST',
                    data:{tipo:tipo},
                    dataType: 'html',
                    success:function(data)
                    {
                        console.log(data);
                        $('#divMaterias').replaceWith(data);
                    }                    
                });          
          }else
          {             
            $('#divMaterias').hide();
          }
        
        //var password = $("input[name=password]").val();

        //var email = $("input[name=email]").val();
   

        /*$.ajax({

           type:'POST',

           url:'/ajaxRequest',

           data:{name:name, password:password, email:email},

           success:function(data){

              alert(data.success);

           }

        });*/
  });
  ///////////////////////////////////////////////////////////////////////////////////////
});