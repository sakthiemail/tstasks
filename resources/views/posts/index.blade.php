@extends('layouts.mainlayout')

@section('content')

<h2>Posts</h2>
<p class='text-right'><button data-toggle="modal" class="btn btn-primary add-modal" data-target="#addModal">Add Post</button></p>
<section class="posts">
  @include('posts.load')
</section>
<p>{{$last_query}}</p>
<div class="col-md-6">
<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel">Add</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form>
            <div class="form-group">
              <lable for="title" class="col-form-label">Title</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="title_add">
                  <small>Min:2 characters and Max:32 characters</small>
                  <p class="errorTitle text-center hidden"></p>
                </div>
            </div>
            <div class="form-group">
              <lable for="title" class="col-form-label">Content</label>
                <div class="col-sm-10">
                  <textarea class="form-control" id="content_add"></textarea>
                  <small>Min:2 characters and Max:255 characters</small>
                  <p class="errorContent text-center hidden"></p>
                </div>
            </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary add">Save</button>
      </div>
    </div>
  </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form>
            <div class="form-group">
              <lable for="title" class="col-form-label">Id</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="id_edit">
                  <p class="errorTitle text-center hidden"></p>
                </div>
            </div>
            <div class="form-group">
              <lable for="title" class="col-form-label">Title</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="title_edit">
                  <small>Min:2 characters and Max:32 characters</small>
                  <p class="errorTitle text-center hidden"></p>
                </div>
            </div>
            <div class="form-group">
              <lable for="title" class="col-form-label">Content</label>
                <div class="col-sm-10">
                  <textarea class="form-control" id="content_edit"></textarea>
                  <small>Min:2 characters and Max:255 characters</small>
                  <p class="errorContent text-center hidden"></p>
                </div>
            </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary edit">Save</button>
      </div>
    </div>
  </div>
</div>

<!-- Show Modal -->
<div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="showModalLabel">Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form class="form-horizantal">
            <div class="form-group">
              <lable for="title" class="col-form-label">Id</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="id_show">
                  <p class="errorTitle text-center hidden"></p>
                </div>
            </div>
            <div class="form-group">
              <lable for="title" class="col-form-label">Title</label>
                <div class="col-sm-10">
                  <input type="text"readonly class="form-control-plaintext" id="title_show">
                  <p class="errorTitle text-center hidden"></p>
                </div>
            </div>
            <div class="form-group">
              <lable for="title" class="col-form-label">Content</label>
                <div class="col-sm-10">
                  <textarea readonly class="form-control-plaintext" id="content_show"></textarea>
                  <p class="errorContent text-center hidden"></p>
                </div>
            </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Show Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3> Are you  sure wat to delet this post?</h3>
          <form class="form-horizantal">
            <div class="form-group">
              <strong><lable for="title" class="col-form-label">Id</label></strong>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="id_delete">
                  <p class="errorTitle text-center hidden"></p>
                </div>
            </div>
            <div class="form-group">
              <strong><lable for="title" class="col-form-label">Title</label></strong>
                <div class="col-sm-10">
                  <input type="text"readonly class="form-control-plaintext" id="title_delete">
                  <p class="errorTitle text-center hidden"></p>
                </div>
            </div>
            <div class="form-group">
              <strong><lable for="content" class="col-form-label">Content</label></strong>
                <div class="col-sm-10">
                  <textarea readonly class="form-control-plaintext" id="content_delete"></textarea>
                  <p class="errorContent text-center hidden"></p>
                </div>
            </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary delete">Delete</button>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
