<x-layouts.app>
    <x-miscomponentes.base>
        <div class=" bg-gray-100 px-4 sm:px-6 lg:px-8 flex items-center justify-center">
            <div class="max-w-md w-full bg-white rounded-xl shadow-lg p-8">

                <div class="text-center mb-8">
                    <h2 class="text-3xl font-extrabold text-gray-900">Contáctanos</h2>
                    <p class="mt-2 text-sm text-gray-600">Nos encantaría saber de ti.</p>
                </div>

                <form action="{{ route('contacto.send') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nombre Completo</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-user text-gray-400"></i>
                            </div>
                            <input type="text" id="name" name="nombre" value="{{ @old('nombre') }}"
                                class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition duration-150 ease-in-out"
                                placeholder="Juan Pérez">
                        </div>
                        <x-input-error for="nombre" />
                    </div>
                    @guest
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Correo
                            Electrónico</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400"></i>
                            </div>
                            <input type="email" id="email" name="email" value="{{ @old('email') }}"
                                class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition duration-150 ease-in-out"
                                placeholder="ejemplo@correo.com">
                        </div>
                         <x-input-error for="email" />
                    </div>
                    @endguest

                    <div>
                        <label for="comments" class="block text-sm font-medium text-gray-700 mb-1">Comentarios</label>
                        <div class="relative">
                            <div class="absolute top-3 left-3 pointer-events-none">
                                <i class="fas fa-comment-dots text-gray-400"></i>
                            </div>
                            <textarea id="comments" name="comentario" rows="4" required
                                class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition duration-150 ease-in-out"
                                placeholder="¿En qué podemos ayudarte?">{{@old('comentario')}}</textarea>
                        </div>
                         <x-input-error for="comentario" />
                    </div>

                    <div class="flex flex-col sm:flex-row gap-3 pt-2">
                        <button type="submit"
                            class="w-full inline-flex justify-center items-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                            <i class="fas fa-paper-plane mr-2"></i> Enviar
                        </button>

                        <a href="/"
                            class="w-full inline-flex justify-center items-center py-2 px-4 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors duration-200">
                            <i class="fas fa-times mr-2"></i> Cancelar
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </x-miscomponentes.base>
</x-layouts.app>
