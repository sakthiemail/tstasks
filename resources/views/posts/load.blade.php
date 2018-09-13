<div id="load" style="position: relative;">
<div class="table-responsive">
  <table class="table table-striped table-sm" id="postTable">
    <thead>
      <tr>
        <th>#</th>
        <th>title</th>
        <th>content</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @if(count($posts)>0)
      @foreach($posts as $post)
      <tr class="item{{$post->id}}">
        <td>{{$post->id}}</td>
        <td>{{$post->title}}</td>
        <td>{{$post->content}}</td>
        <td>
          <button data-toggle="modal" class="btn btn-warning show-modal" data-target="#showModal" data-id="{{$post->id}}" data-title="{{$post->title}}" data-content="{{$post->content}}">Show</button>
          <button data-toggle="modal" class="btn btn-success edit-modal" data-target="#editModal" data-id="{{$post->id}}" data-title="{{$post->title}}" data-content="{{$post->content}}">Edit</button>
          <button data-toggle="modal" class="btn btn-danger delete-modal" data-target="#deleteModal" data-id="{{$post->id}}" data-title="{{$post->title}}" data-content="{{$post->content}}">Delete</button>
        </td>
      </tr>
      @endforeach
      @endif
    </tbody>
  </table>
</div>
</div>
{{ $posts->links("pagination::bootstrap-4") }}
