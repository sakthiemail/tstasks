<div class="container-fluid nopadding">
<footer>
   <div class="container-fluid bg-primary py-3 shadow">
    <div class="container">
      <div class="row">
        <div class="col-md-7">
            <div class="row py-0">
          <div class="col-sm-1 hidden-md-down">
              <a class="bg-circle bg-info" href="#">
                <i class="fa fa-2x fa-fw fa-address-card" aria-hidden="true "></i>
              </a>
            </div>
            <div class="col-sm-11 text-white">
                <div><h4>  Contact</h4>
                    <p>   <span class="header-font">M</span>y<span class="header-font">w</span>website.com</p>
                </div>
            </div>
            </div>
        </div>
        <div class="col-md-5">
          <div class="d-inline-block">
            <div class="bg-circle-outline d-inline-block text-center" style="background-color:#3b5998">
              <a href="https://www.facebook.com/"><i class="fab fa-2x fa-fw fa-facebook text-white"></i>
		          </a>
            </div>
            <div class="bg-circle-outline d-inline-block text-center" style="background-color:#4099FF">
              <a href="https://twitter.com/">
                <i class="fab fa-2x fa-fw fa-twitter text-white"></i></a>
            </div>

            <div class="bg-circle-outline d-inline-block text-center" style="background-color:#0077B5">
              <a href="https://www.linkedin.com/company/">
                <i class="fab fa-2x fa-fw fa-linkedin text-white"></i></a>
            </div>
            <div class="bg-circle-outline d-inline-block text-center" style="background-color:#d34836">
              <a href="https://www.google.com/">
                <i class="fab fa-2x fa-fw fa-google text-white"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
   </div>
</footer>
    <!--/.footer-->
<p class="text-center"> Copyright © Footer Mywebsite Plugin 2014. All right reserved. </p>
    <!--/.footer-bottom-->
</div>
</div>
<script type="text/javascript" src="{{asset('js/jquery331.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('dist/js/bootstrap.min.js')}}"></script>
<!-- toastr notifications -->
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script type="text/javascript" src="{{asset('js/custom.js')}}"></script>
<script type="text/javascript">
$('.modal-footer').on('click','.add', function(){
  $.ajax({
    type:'POST',
    url :'posts',
    data:{
        '_token':$('input[name=_token]').val(),
        'title':$('#title_add').val(),
        'content':$('#content_add').val()
    },
    success:function(data){
      $('.errorTitle').addClass('hidden');
      $('.errorContent').addClass('hidden');
      if(data.errors){
        setTimeout(function (){
          $('#addModal').modal('show');
          toastr.error('Validation error!','Error Alert',{timeout:5000});
        },500);
        if(data.errors.title){
          $('.errorTitle').removeClass('hidden');
          $('.errorTitle').text(data.errors.title);
        }
        if(data.errors.content){
          $('.errorTitle').removeClass('hidden');
          $('.errorTitle').text(data.content.title);
        }
      }else{
          $('#addModal').modal('toggle');
          toastr.success('Post is sucessfully added!','Success Alert',{timeout:5000});
          $('#postTable').append("<tr class='item'"+data.id+"><td>"+data.id+"</td><td>"+data.title+"</td><td>"+data.content+"</td><td><button class='show-modal btn btn-warning' data-id="+data.id+" data-title="+data.title+" data-content="+data.conten+">Show</button><button class='edit-modal btn btn-success' data-id="+data.id+" data-title="+data.title+" data-content="+data.content+">Edit</button><button class='delete-modal btn btn-danger' data-id="+data.id+" data-title="+data.title+" data-content="+data.content+">Delete</button></td></tr>");
      }
    },
  });
});
$(document).on('click', '.show-modal', function() {
            $('.modal-title').text('Show');
            $('#id_show').val($(this).data('id'));
            $('#title_show').val($(this).data('title'));
            $('#content_show').val($(this).data('content'));
            id = $('#id_show').val();
            $('#showModal').modal('show');
        });
$(document).on('click', '.edit-modal', function() {
            $('.modal-title').text('Edit');
            $('#id_edit').val($(this).data('id'));
            $('#title_edit').val($(this).data('title'));
            $('#content_edit').val($(this).data('content'));
            id = $('#id_edit').val();
            $('#editModal').modal('show');
        });
$('.modal-footer').on('click','.edit', function(){
  $.ajax({
    type:'PUT',
    url :'posts/'+id,
    data:{
        '_token':$('input[name=_token]').val(),
        'id':$('#id_edit').val(),
        'title':$('#title_edit').val(),
        'content':$('#content_edit').val()
    },
    success:function(data){
      $('.errorTitle').addClass('hidden');
      $('.errorContent').addClass('hidden');
      if(data.errors){
        setTimeout(function (){
          $('#editModal').modal('show');
          toastr.error('Validation error!','Error Alert',{timeout:5000});
        },500);
        if(data.errors.title){
          $('.errorTitle').removeClass('hidden');
          $('.errorTitle').text(data.errors.title);
        }
        if(data.errors.content){
          $('.errorTitle').removeClass('hidden');
          $('.errorTitle').text(data.content.title);
        }
      }else{
          $('#editModal').modal('toggle');
          toastr.success('Post is sucessfully updated!','Success Alert',{timeout:5000});
          $('.item' + data.id).replaceWith("<tr class='item'"+data.id+"><td>"+data.id+"</td><td>"+data.title+"</td><td>"+data.content+"</td><td><button class='show-modal btn btn-warning' data-id="+data.id+" data-title="+data.title+" data-content="+data.conten+">Show</button><button class='edit-modal btn btn-success' data-id="+data.id+" data-title="+data.title+" data-content="+data.content+">Edit</button><button class='delete-modal btn btn-danger' data-id="+data.id+" data-title="+data.title+" data-content="+data.content+">Delete</button></td></tr>");
      }
    },
  });
});
$(document).on('click', '.delete-modal', function() {
      $('.modal-title').text('Delete');
      $('#id_delete').val($(this).data('id'));
      $('#title_delete').val($(this).data('title'));
      $('#content_delete').val($(this).data('content'));
      id = $('#id_edit').val();
  });
$('.modal-footer').on('click','.delete', function(){
  $.ajax({
    type:'PUT',
    url :'posts/'+id,
    data:{
        '_token':$('input[name=_token]').val(),
    },
    success:function(data){
          $('#editModal').modal('toggle');
          toastr.success('Post is sucessfully deleted!','Success Alert',{timeout:5000});
          $('.item' + data.id).remove();
    },
  });
});
</script>
<script type="text/javascript">
    $(function() {
    $('body').on('click', '.pagination a', function(e) {
        e.preventDefault();
        $('#load a').css('color', '#dfecf6');
        var url = $(this).attr('href');
        getPosts(url);
        window.history.pushState("", "", url);
    });

    function getPosts(url) {
        $.ajax({
            url : url
        }).done(function (data) {
            $('.posts').html(data);
        }).fail(function () {
            alert('Posts could not be loaded.');
        });
    }
});

</script>
</body>
</html>
