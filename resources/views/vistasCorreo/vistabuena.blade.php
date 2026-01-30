@component('mail::message')
## NOMBRE {{ $datos['nombre'] }}
**EMAIL:** *{{ $datos['email'] }}*

## Comentario de {{ $datos['nombre'] }}
*{{ $datos['comentario'] }}*
@endcomponent