   <form action="/admin/{{ $routeName }}/{{ $row->id }}" method="POST">
                      @csrf
                      @method("DELETE")
                      <button type="submit" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Remove {{ $sMduleName }}">
                      <i class="material-icons">close</i>
                      </button>
                    </form>