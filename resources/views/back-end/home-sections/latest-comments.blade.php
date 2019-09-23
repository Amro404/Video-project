
          <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Latest Comments</h4>
                  <p class="card-category">Here you can see the comments of website</p>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-warning">
                      <tr><th>ID</th>
                      <th>Name</th>
                      <th>Comment</th>
                      <th>Video</th>
                      <th>Date</th>
                      <th>Control</th>
                    </tr></thead>
                    <tbody>
                      @foreach($comments as $comment)
                      <tr>

                        <td>{{ $comment->id }}</td>
                        <td><a href="/admin/users/{{ $comment->user->id }}/edit">{{ $comment->user->name }}</a></td>
                        <td>{{ $comment->comment }}</td>
                        <td><a href="/admin/videos/{{ $comment->video->id }}/edit">{{ $comment->video->name }}</a></td>
                        <td>{{ $comment->created_at }}</td>

                        <td><a href="/admin/comments/{{ $comment->id }}">Delete</a></td>
           
                      </tr>
                      @endforeach
                    </tbody>
                  </table>

                  {!! $comments->links() !!}
                </div>
              </div>
            </div>
