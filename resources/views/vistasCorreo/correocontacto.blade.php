<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-slate-50 p-6 font-sans">

    <div class="max-w-2xl mx-auto bg-white rounded-xl shadow-lg overflow-hidden border border-slate-200">
        
        <div class="bg-indigo-600 p-6 text-white flex items-center justify-between">
            <div>
                <h1 class="text-xl font-bold tracking-tight">Nuevo Ticket de Soporte</h1>
                <p class="text-indigo-100 text-sm">Centro de atención al cliente</p>
            </div>
            <i class="fas fa-headset text-3xl opacity-80"></i>
        </div>

        <div class="p-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div class="flex items-center space-x-4 p-4 bg-slate-50 rounded-lg">
                    <div class="bg-indigo-100 text-indigo-600 p-3 rounded-full">
                        <i class="fas fa-user"></i>
                    </div>
                    <div>
                        <p class="text-xs text-slate-500 uppercase font-semibold">Nombre</p>
                        <p class="text-slate-800 font-medium">{{$datos['nombre']}}</p>
                    </div>
                </div>

                <div class="flex items-center space-x-4 p-4 bg-slate-50 rounded-lg">
                    <div class="bg-indigo-100 text-indigo-600 p-3 rounded-full">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div>
                        <p class="text-xs text-slate-500 uppercase font-semibold">Email</p>
                        <p class="text-indigo-600 font-medium">{{$datos['email']}}</p>
                    </div>
                </div>
            </div>

            <div class="space-y-3">
                <div class="flex items-center space-x-2 text-slate-700 font-semibold mb-2">
                    <i class="fas fa-comment-dots"></i>
                    <span>Mensaje del usuario:</span>
                </div>
                <div class="bg-white border-l-4 border-indigo-500 p-6 rounded-r-lg shadow-sm italic text-slate-600 leading-relaxed">
                    "{{ $datos['comentario'] }}"
                </div>
            </div>

            <div class="mt-10 pt-6 border-t border-slate-100 text-center">
                <a href="mailto:[correo@ejemplo.com]" class="inline-flex items-center justify-center px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-lg transition duration-200 ease-in-out shadow-md">
                    <i class="fas fa-reply mr-2"></i>
                    Responder al Usuario
                </a>
            </div>
        </div>

        <div class="bg-slate-50 p-4 text-center text-xs text-slate-400">
            Este es un mensaje generado automáticamente por el sistema de soporte.
        </div>
    </div>

</body>
</html>