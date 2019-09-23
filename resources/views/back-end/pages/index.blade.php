@extends("back-end.layout.app")


@section("title")
	{{ $pageTitle }}
@endsection


@section("content")
	
	@component("back-end.layout.header")
		@slot('nav_title')
			{{ $pageTitle }}
		@endslot
	@endcomponent

  @component("back-end.shared.table", ["pageTitle" => $pageTitle, "pageDesc" => $pageDesc ])
    @slot('addButton')
        <div class="col-md-4 text-right">
          <a href="/admin/{{ $routeName }}/create" class="btn btn-white btn-round">Add {{ $sMduleName }}</a>
        </div>
    @endslot
    @slot("slot")
      <div class="table-responsive">
        <table class="table">
          <thead class=" text-primary">
            <tr><th>
              ID
            </th>
            <th>
              Name
            </th>
             <th>
              Description
            </th>
            <th>
              Meta Description
            </th>                     
            <th>
              Meta Keywords
            </th>
             <th class="text-right">
              Control
            </th>
          </tr></thead>
          <tbody>
            @foreach($rows as $row)
              <tr>
                <td>
                  {{ $row->id }}
                </td>
                <td>
                  {{ $row->name }}
                </td>
                  <td>
                  {{ $row->desc }}
                </td>
                <td>
                  {{ $row->meta_desc}}
                </td>
                <td>
                  {{ $row->meta_keywords }}
                </td>
                <td class="td-actions text-right">
                  @include("back-end.shared.buttons.edit")
                  @include("back-end.shared.buttons.delete")
                    
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        {!! $rows->links() !!}
      </div>
      @endslot
  @endcomponent


@endsection

