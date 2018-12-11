@extends('layouts.master')

@section('content')


	
		<section class="content-header">
      <h1>
        Document
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Transaction</a></li>
        
        <li class="active">Documents</li>
      </ol>
    </section>

    <section class = "content">

      <div class="row">


        <div class="col-md-6">

                
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title"><span class="label label-primary">Request Information</span></h3>

            </div><!-- /.box-header -->
            <!-- form start  <form method = "POST" action="{{URL::to('addOfficialPosition')}}"> style="height:500px; overflow-y:scroll"-->
            
              <div class="box-body">
              <input type="hidden" name="idr" id = "idr" value = "{{$IDR}}">
              <input type="hidden" name="idd" id = "idd" value = "{{$IDD}}">
              <input type="text" 
                      class="form-control" 
                      id = "txtOfficialID"
                      name = "txtOfficialID"
                      value="{{Session::get('officialID')}}" style="display:block">

            @if($req[0] -> RFType == 0)

              <div class="col-md-6">
                <div class="form-group">
                  <label>Name of Requestor</label>
                  <input type="text" 
                      class="form-control" 
                      id = "txtRequestor"
                      name = "txtRequestor"
                      value="{{$ri[0] -> Requestor}}"
                      readonly="">
                </div>
              </div>
              
              <div class="col-md-6">
                <div class="form-group">
                  <label>Requested For</label>
                  <input type="text" 
                      class="form-control" 
                      id = "txtResName"
                      name = "txtResName"
                      value="{{$ri[0]->FirstName}} {{$ri[0]->LastName}}"
                      readonly="">
                </div>
              </div>
              
              <div class="col-md-6">
                <div class="form-group">
                  <label>Address</label>
                  <input type="text" 
                      class="form-control" 
                      id = "txtAddress"
                      name = "txtAddress"
                      value="{{$ri[0]->HouseAddNo}} {{$ri[0]->HouseStreet}}"
                      readonly="">
                </div>
              </div>
             
              <div class="col-md-6">
                <div class="form-group">
                  <label>Purpose</label>
                  <input type="text" 
                      class="form-control" 
                      id = "txtPurpose"
                      name = "txtPurpose"
                      value="{{$ri[0]->DocReqPurpose}}"
                      readonly="">
                </div>
              </div>
              
              <div class="col-md-12">
                <div class="form-group">
                  <label>Status</label>
                  <input type="text" 
                      class="form-control" 
                      id = "txtStatus"
                      name = "txtStatus"
                      value="{{$req[0]->DocReqStatus}}"
                      readonly="">
                </div>
              </div>
            @endif

            @if($req[0] -> RFType == 1)
              
              <div class="col-md-6">
                <div class="form-group">
                  <label>Name of Requestor</label>
                  <input type="text" 
                      class="form-control" 
                      id = "txtRequestor"
                      name = "txtRequestor"
                      value="{{$nri[0] -> Requestor}}"
                      readonly="">
                </div>
              </div>
              
              <div class="col-md-6">
                <div class="form-group">
                  <label>Requested For</label>
                  <input type="text" 
                      class="form-control" 
                      id = "txtResName"
                      name = "txtResName"
                      value="{{$nri[0]->NonResName}}"
                      readonly="">
                </div>
              </div>
              
              <div class="col-md-6">
                <div class="form-group">
                  <label>Address</label>
                  <input type="text" 
                      class="form-control" 
                      id = "txtAddress"
                      name = "txtAddress"
                      value="{{$nri[0]->FRAddress}}"
                      readonly="">
                </div>
              </div>
             
              <div class="col-md-6">
                <div class="form-group">
                  <label>Purpose</label>
                  <input type="text" 
                      class="form-control" 
                      id = "txtPurpose"
                      name = "txtPurpose"
                      value="{{$nri[0]->DocReqPurpose}}"
                      readonly="">
                </div>
              </div>
              
              <div class="col-md-12">
                <div class="form-group">
                  <label>Status</label>
                  <input type="text" 
                      class="form-control" 
                      id = "txtStatus"
                      name = "txtStatus"
                      value="{{$req[0]->DocReqStatus}}"
                      readonly="">
                </div>
              </div>
            @endif
              </div><!-- /.box-body -->

               <div class="box-footer">
                    <!-- <center><button type = "submit" class="btn btn-info btn-flat" id = "btnSubmit">Submit</button></center> -->
                  </div>

              
            
          </div><!--</form> /.box -->
          </div>
          <div class="col-md-6">
           <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title"><span class="label label-primary">Official Information</span></h3>

            </div><!-- /.box-header -->
            <!-- form start  <form method = "POST" action="{{URL::to('addOfficialPosition')}}"> style="height:500px; overflow-y:scroll"-->
            
              <div class="box-body">

              @foreach($fs as $fs)
                

                
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">Position</label>
                  <input type="text" 
                      class="form-control" 
                      id = "txtPosition"
                      name = "txtPosition"
                      value="{{Session::get('position')}}"
                      readonly="">
                </div>
              </div>
              
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" 
                      class="form-control" 
                      id = "txtKagawad"
                      name = "txtKagawad"
                      value="{{Session::get('firstname')}} {{Session::get('lastname')}}"
                      readonly="">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Signature</label>
                    <div class="input-group input-group-sm">
                    <input type="text" class="form-control" readonly="" value="Add your signature"
                        id = "txt_2">
                        <span class="input-group-btn">
                          <button type="button" 
                                class="btn btn-info btn-flat"
                                onclick = "addSign('{{$fs->Signature}}')"
                                id = "addSignature"
                                name = "addSignature">Add</button>
                          <button type="button" 
                                class="btn btn-danger btn-flat" 
                                disabled=""
                                onclick="removeSign('{{$fs->Signature}}')" 
                                id = "removeSignature"
                                name = "removeSignature">Remove</button>
                        </span>
                  </div>
                  </div>
                </div>
             
             <div class="col-md-6">
                <div class="form-group">
                  
                  <img src = "{{ asset ('bower_components/admin-lte/dist/images/').'/'.$fs->Signature }}" width="100%">
                </div>
              </div>
              

               @endforeach

              </div><!-- /.box-body -->

               <div class="box-footer" id= "footer">
                    <center><button type = "button" class="btn btn-info btn-flat" id = "btnSubmit">Submit</button></center><br>
                  </div>

              
            
          </div>
          
        </div>




        <div class="col-md-12">
            <div class="box box-info">
              <div class="box-header">
                <h3 class="box-title">Document</h3>
                <div id = "ewan">
                <button type = "button" class="btn btn-info btn-flat pull-right" id = "btnConfirm">Confirm</button>  
                <button type = "button" class="btn btn-info btn-flat pull-right" id = "btnChange" disabled="">Edit</button>  
                </div>
              </div><!-- /.box-header -->

              
              @foreach($template as $t)
                <div id="con" hidden>{{$t->DocTemplate}}</div>
                <div class="box-body pad" style = "position:relative" id = "hey" name = "hey">
                   <div style="text-align:left; position:inherit">{{$t -> DocumentTemplate}}</div> 
                </div>
              @endforeach
                
              
            </div>
          </div>

      </div><!--row-->



 <!--////////////////////////////****************PAYMENT MODAL*****************************/////////////////////////-->
  <div class="modal fade" id="payment" name="payment">
    <div class="modal-dialog modal-lg" style="width: 650px">
          <!-- form start method = "POST" action="{{URL::to('updateOfficialPosition')}}"-->
          <div class="form-horizontal" >
              <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="fa fa-money"></i> &nbsp;&nbsp;&nbsp; Payment
                    </h4>
                  </div>
              <!-- modal content -->
              <div class="modal-body">
            

                      <div class="col-md-12">
                    <table  style="border-spacing: 17px;border-collapse: separate;">
                      <tbody>
                        <tr>
                          <td><span class="label label-primary">Request No.</span></td>
                          <td><label for="docNo"></label></td>
                          <td><span class="label label-primary">Request Date</span></td>
                          <td><label for="docDate"></label></td>
                          
                         
                        </tr>
                        <tr>
                          <td><span class="label label-primary">Requestor Name</span></td>
                          <td><label for="reqName"></label></td>
                          <td><span class="label label-primary">Requested For</span></td>
                          <td><label for="forName"></label></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>


          

                    <div class="col-md-12">
                      <br>
                      <table class="table table-striped" id="dpRtable" estyle="font-size: 13px;">
                        <thead>
                            <tr>
                              <th>Document</th>
                              <th>Purpose</th>
                              <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($payment as $pay)
                            <tr>
                              <td>{{$pay->DocumentName}}</td>
                              <td>{{$pay->DocReqPurpose}}</td>
                              <td>{{$pay->DocumentFee}}</td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>


                     <div class="col-md-5">
                     </div>
                     <div class="col-md-7">
                      <table  style="border-spacing: 17px;border-collapse: separate;">
                        <tbody>
                          <tr bgcolor="#ffffb3">
                          @foreach($payment as $pay)
                            <td><label>Total Amount(&#8369;)</label></td>
                            <td><input class="form-control" type="number" step="any" id="dptotal" name="dptotal" value="{{$pay->DocumentFee}}" disabled></td>
                          @endforeach
                          </tr>
                        </tbody>
                      </table>       
                    </div>
            

               <div class="modal-footer">
                <button type="submit" class="btn btn-success"  id="btndocSubmit" data-dismiss="modal">Submit</button>
                <a href = "<?php echo 'printTemplate' ?>?idr={{$IDR}}&idd={{$IDD}}" class="btn btn-danger btn-flat pull-left"  id="btnPrint">Print</a>                
              </div><!-- /.modal-content -->
            
              </div>
        </div>
      </div>
  </div>
</div>
  <!--////////////////////////////****************PAYMENT MODAL*****************************////////?/////////////////-->


      <script src="{{ asset ('bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>

      <script type = "text/javascript">
        $(document).ready(function(){


            /*var content = $('#Template');
                    var contentPar = content.parent()
                    contentPar.find('.wysihtml5-toolbar').remove()
                    contentPar.find('iframe').remove()
                    contentPar.find('input[name*="wysihtml5"]').remove()
                    content.show()*/



          if($('#txtStatus').val() == "New"){


            $('.blank').text("______________________");
            $('.rName').text($('#txtRequestor').val());
            $('.Name').text($('#txtResName').val());
            $('.Address').text($('#txtAddress').val());
            $('.Purpose').text($('#txtPurpose').val());
            $('.Kagawad').text($('#txtKagawad').val());
            $('.Signature').text($('#txtKagawad').val());

           // $('#forTextArea').empty();

            $('#forTextArea').html('<textarea id = "Template" name = "Template" class="textarea" placeholder="Place some text here" style="width: 100%; height: 90%; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px; overflow: hidden;"></textarea><div id = "plsWorkJesus"></div>');



                    $('#Template').wysihtml5({
                      events: {
                        load: function() {
                          $('.wysihtml5-sandbox').contents().find('body').on("keyup",function(event) {
                            //your key event
                            $('blockquote').css({"margin" : "0 0 0 40px"});
                            $('blockquote').css({"border" : "none"});
                            $('blockquote').css({"padding" : "0px"});
                          }); 
                        }
                      }
                    });
                    $('#Template').val($('#con').html());

           

            $('#btnConfirm').click(function(){

              $('#btnChange').removeAttr("disabled");
              $('#btnConfirm').attr("disabled", "disabled");

              var content = $('#Template');
                    var contentPar = content.parent()
                    contentPar.find('.wysihtml5-toolbar').remove()
                    contentPar.find('iframe').remove()
                    contentPar.find('input[name*="wysihtml5"]').remove()
                    content.show()


              var content = $('#Template').val();
              $('#forTextArea').html(content);
              $('blockquote').css({"margin" : "0 0 0 40px"});
              $('blockquote').css({"border" : "none"});
              $('blockquote').css({"padding" : "0px"});
              $('#Template').attr("hidden","hidden");


            });

            $('#btnChange').click(function(){

              $('#btnChange').attr("disabled", "disabled");
              $('#btnConfirm').removeAttr("disabled");

              var content = $('#forTextArea').html();
              $('#forTextArea').empty();
              $('#forTextArea').html('<textarea id = "Template" name = "Template" class="textarea" placeholder="Place some text here" style="width: 100%; height: 90%; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px; overflow: hidden;"></textarea><div id = "plsWorkJesus"></div>');
              $('#Template').wysihtml5();
              $('#Template').val(content);

            });

          }// if

          else
          {
            $.ajax({
              type: 'POST',
              url: 'getFinalTemplate',
              data: {idr: $('#idr').val(),
                      idd: $('#idd').val()},
              dataType: 'JSON',
              success: function(data)
              {
               // alert(JSON.stringify(data));
                $('#hey').html(data.ft[0].TemplateFinal);
              },error:function(request, error){
               // alert('huhuhu' + error);
              }
            });

            $('#btnConfirm').remove();
            $('#btnChange').remove();
          }

          
          $('#forTextArea').css({"text-align" : "left"});
          //alert($('#forBG').html());
            

            $('#btnSubmit').click(function(){
              $.ajax({
                type: 'POST',
                url: 'saveTemplate',
                data: {doc: $('#hey').html(),
                        idr: $('#idr').val(),
                        idd: $('#idd').val(),
                        officialID: $('#txtOfficialID').val(),
                        stat: $('#txtStatus').val()},
                success:function(data){

                  window.location.href = "{{URL::to('documentRequest')}}";
                },
                error: function(request, error){
                  alert(error);
                }
              }).error(function(ts){
                alert(ts.responseText);
              });
            });


            $('#btndocSubmit').click(function(){
              $.ajax({
                type: 'POST',
                url: 'saveTemplate',
                data: {doc: $('#hey').html(),
                        idr: $('#idr').val(),
                        idd: $('#idd').val(),
                        position: $('#txtPosition').val(),
                        stat: $('#txtStatus').val()},
                success:function(data){

                  window.location.href = "{{URL::to('documentRequest')}}";
                },
                error: function(request, error){
                  alert(error);
                }
              }).error(function(ts){
                alert(ts.responseText);
              });
            });

            // if($('#txtStatus').val()=="Done/Unclaimed")
            // {
            //   $('#btndocSubmit').attr("disabled", "disabled");
            //      $('#btnSubmit').hide();
            //      $('#ewan').remove();

            //   $('#footer').append('<center><a class="btn btn-danger btn-flat" data-toggle="modal" data-target = "#payment" id = "btnPayment" onclick = "ModalPayment()">Payment</a></center>');

            //   $.ajax({
            //   type: 'POST',
            //   url: 'getFinalTemplate',
            //   data: {idr: $('#idr').val(),
            //           idd: $('#idd').val()},
            //   dataType: 'JSON',
            //   success: function(data)
            //   {
            //    // alert(JSON.stringify(data));
            //     $('#hey').html(data.ft[0].TemplateFinal);
            //   },error:function(request, error){
            //     //alert('huhuhu' + error);
            //   }
            // });


            //   $('#btnPrint').click(function(){
            //      $('#btndocSubmit').removeAttr("disabled");

            //    });
            // }

            

        });

        


      </script>

      <script type="text/javascript">
        function addSign(sign)
        {

              var signs = "{{ asset ('bower_components/admin-lte/dist/images/') }}/" + sign;
              
              $('#forTextArea').append("<div  id = '"+$('#txtPosition').val()+"sign'><img src = "+signs+" style='margin-top:-150px;margin-left:200px' width='20%'></div>");
              $('#'+$('#txtPosition').val()+'sign').draggable();
              $('#addSignature').attr('disabled', 'disabled');
              $('#removeSignature').removeAttr('disabled');
        }
        function removeSign(sign)
        {
            $('#'+$('#txtPosition').val()+'sign').remove();
              $('#removeSignature').attr('disabled', 'disabled');
              $('#addSignature').removeAttr('disabled');
        }



         function ModalPayment() 
         {

             $.ajax({
              type:'POST',
              url: 'getDocPaymentInfo',
              data:{ idr: $('#idr').val()},
              dataType:'JSON',
              success: function(data){
               $.each(data.req, function(key, val)   {
                   
                    $("label[for='docNo']").html(val.RequestID);
                    $("label[for='docDate']").html(val.DateOfRequest);
                    $("label[for='reqName']").html(val.Requestor);
                    $("label[for='forName']").html( $('#txtResName').val());
                });
              },error: function (request, error)    {
                          console.log(arguments);
                          alert(" Can't do because: " + error);
                        }
                  }).error(function(ts){
                    alert(ts.responseText);
                 });
         }
      </script>

    </section>



@stop