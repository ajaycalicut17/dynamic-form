<x-guest-layout>

  <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 mt-12">
    <div class="mt-10 sm:mt-0">
      <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
          <div class="px-4 sm:px-0">
            <h3 class="text-lg font-medium leading-6 text-gray-900">Form Details</h3>
            <p class="mt-1 text-sm text-gray-600">
              {{ $form->name }}
            </p>
          </div>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
          <form action="#" method="POST">
            <div class="shadow overflow-hidden sm:rounded-md">
              <div class="px-4 py-5 bg-white sm:p-6">
                <div class="grid grid-cols-6 gap-6">
                  
                  @foreach ($form->attributesFormField as $form_details)
                  
                  <div class="col-span-8 sm:col-span-6">
                    <label for="{{ str_replace(' ', '-', $form_details->label) }}" class="block text-sm font-medium text-gray-700">{{ $form_details->label }}</label>
                    @if ($form_details->field_id == 1)
                    <input type="text" name="{{ str_replace(' ', '-', $form_details->label) }}" id="{{ str_replace(' ', '-', $form_details->label) }}" autocomplete="{{ str_replace(' ', '-', $form_details->label) }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    @elseif ($form_details->field_id == 2)
                    <input type="number" name="{{ str_replace(' ', '-', $form_details->label) }}" id="{{ str_replace(' ', '-', $form_details->label) }}" autocomplete="{{ str_replace(' ', '-', $form_details->label) }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    @elseif ($form_details->field_id == 3)
                    
                    <select id="{{ str_replace(' ', '-', $form_details->label) }}" name="{{ str_replace(' ', '-', $form_details->label) }}" autocomplete="{{ str_replace(' ', '-', $form_details->label) }}" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                      @foreach ($form_details->options as $form_details_option)
                      <option value="{{ $form_details_option->option }}">{{ $form_details_option->option }}</option>
                      @endforeach
                    </select>
                    @endif
                  </div>
                      
                  @endforeach
                  
                </div>
              </div>
              <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <a href="{{ route('home') }}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                  {{ __('Back') }}
                </a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-guest-layout>