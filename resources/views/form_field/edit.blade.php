<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Edit Form Field') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="mt-10 sm:mt-0">
        <div class="md:grid md:grid-cols-3 md:gap-6">
          <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
              <h3 class="text-lg font-medium leading-6 text-gray-900">Edit form fields</h3>
            </div>
          </div>
          <div class="mt-5 md:mt-0 md:col-span-2">
            <form action="{{ route('form_field.update', $formField->id) }}" method="POST">
              @method('PUT')
              @csrf
              <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                  <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-8 sm:col-span-6">
                      <label for="label" class="block text-sm font-medium text-gray-700">{{ __('Label') }}</label>
                      <input type="text" name="label" id="label" value="{{ $formField->label }}" autocomplete="label" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                      @error('label')
                      <div class="text-red-500">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="col-span-8 sm:col-span-6">
                      <label for="field_type" class="block text-sm font-medium text-gray-700">{{ __('Field Type') }}</label>
                      <select id="field_type" name="field_type" autocomplete="field_type" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @foreach ($fields as $field)
                        <option value="{{ $field->id }}" @if ($field->id == $formField->field_id) {{ 'selected' }} @endif>{{ $field->name }}</option>
                        @endforeach
                      </select>
                      @error('field_type')
                      <div class="text-red-50">{{ $message }}</div>
                      @enderror
                      <div id="div_for_select_option">
                        @if (count($formField->options))
                        <button class="bg-blue-500 hover:bg-blue-700 text-white rounded-full mt-4" id="div_for_select_option_button"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg></button>
                        @endif
                        @foreach ($formField->options as $option)
                        <input type="text" name="option[]" id="option" value={{ $option->option }} autocomplete="option" class="mt-4 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        @endforeach
                      </div>
                    </div>
                  </div>
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                  <input type="submit" value="Save" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>
  </div>

  <script>
    $('#field_type').change(function (e) { 
      e.preventDefault();
      if (this.value == 3) {
        $('#div_for_select_option').html("<button class='bg-blue-500 hover:bg-blue-700 text-white rounded-full mt-4' id='div_for_select_option_button'><svg class='w-6 h-6' fill='none' stroke='currentColor' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M12 6v6m0 0v6m0-6h6m-6 0H6'></path></svg></button><input type='text' name='option[]' id='option' autocomplete='option' class='mt-4 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md'>");
      } else {
        $('#div_for_select_option').html("");
      }
    });

    $('#div_for_select_option, #div_for_select_option_button').click(function (e) { 
      e.preventDefault();
      $('#div_for_select_option').append("<input type='text' name='option[]' id='option' autocomplete='option' class='mt-4 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md'>");
    });
  </script>
</x-app-layout>