@foreach ($tags as $tag)
    <tr>
        <td>{{$tag->nombre}}</td>
        <td>{{$tag->slug}}</td>
        <td>
            <a href="{{route("tag.editar", $tag->id)}}" class="editar-registro" data-toggle="tooltip" title="Editar este registro">
                <i class="fas fa-edit"></i>
            </a>
            <form action="{{route('tag.eliminar', $tag->id)}}" class="eliminar-registro d-inline" method="POST">
                @csrf @method('delete')
                <button type="submit" class="btn-accion-tabla" data-toggle="tooltip" title="Eliminar este registro">
                    <i class="text-danger fas fa-trash"></i>
                </button>
            </form>
        </td>
    </tr>
@endforeach
