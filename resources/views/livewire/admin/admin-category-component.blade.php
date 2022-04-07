<div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Slug</th>
          </tr>
        </thead>
        <tbody>
            @forelse ($items as $item )
                
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->slug}}</td>
                </tr>
            @empty
                <tr>
                <th scope="row">No Ccategory</th>
                </tr>
            @endforelse
        </tbody>
        <div class="wrap-pagination-info">
            {{$items->links('pagination::bootstrap-4')}}
        </div>
      </table>
</div>
