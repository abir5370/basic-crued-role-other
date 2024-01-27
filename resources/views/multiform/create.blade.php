@extends('layouts.dashboard')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <form id="multiStepForm" action="{{ route('multiform.store') }}" method="POST">
          @csrf
          <div class="step" id="step1">
            <h2>Step 1</h2>
            <div class="form-group">
              <label for="name">Name</label>
              <select name="name" id="name" onchange="updateSelectedName()">
                <option value="rahim">Rahim</option>
                <option value="karim">Karim</option>
                <option value="salam">Salam</option>
              </select>
            </div>
            <button type="button" class="btn btn-primary float-right" onclick="nextStep(1)">Next</button>
          </div>
  
          <div class="step d-none" id="step2">
            <h2>Step 2</h2>
            <div class="form-group">
              <label for="email">Email</label>
              <input name="email" readonly class="form-control" id="email" required>
            </div>
            
            <button type="button" class="btn btn-secondary float-left" onclick="prevStep(2)">Previous</button>
            <button type="button" class="btn btn-primary float-right" onclick="nextStep(2)">Next</button>
          </div>
  
          <div class="step d-none" id="step3">
            <h2>Step 3</h2>
            <div class="form-group">
              <label for="phone">Phone</label>
              <input type="number" name="phone" class="form-control" id="phone" required>
            </div>
            <button type="button" class="btn btn-secondary float-left" onclick="prevStep(3)">Previous</button>
            <button type="submit" class="btn btn-success float-right">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('footer_script')
<script>
    let selectedName; // Variable to store the selected name

    function updateSelectedName() {
      selectedName = document.getElementById('name').value;
    }

    function nextStep(currentStep) {
      if (currentStep === 1) {
        // Set the selected name in the email input of the next step
        document.getElementById('email').value = selectedName;
      }

      $(`#step${currentStep}`).addClass('d-none');
      $(`#step${currentStep + 1}`).removeClass('d-none');
    }
  
    function prevStep(currentStep) {
      $(`#step${currentStep}`).addClass('d-none');
      $(`#step${currentStep - 1}`).removeClass('d-none');
    }
</script>
@endsection




{{-- @section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <form id="multiStepForm" action="{{route('multiform.store')}}" method="POST">
          @csrf
          <div class="step" id="step1">
            <h2>Step 1</h2>
            <div class="form-group">
              <label for="field1">Name</label>
              <select name="name" id="">
                <option value="rahim">Rahim</option>
                <option value="karim">Karim</option>
                <option value="salam">Salam</option>
              </select>
            </div>
            <button type="button" class="btn btn-primary float-right" onclick="nextStep(1)">Next</button>
          </div>
  
          <div class="step d-none" id="step2">
            <h2>Step 2</h2>
            <div class="form-group">
              <label for="field2">Email</label>
              <input type="text" name="email" class="form-control" id="field2" required>
            </div>
            <button type="button" class="btn btn-secondary float-left" onclick="prevStep(2)">Previous</button>
            <button type="button" class="btn btn-primary float-right" onclick="nextStep(2)">Next</button>
          </div>
  
          <div class="step d-none" id="step3">
            <h2>Step 3</h2>
            <div class="form-group">
              <label for="field3">phone</label>
              <input type="number" name="phone" class="form-control" id="field3" required>
            </div>
            <button type="button" class="btn btn-secondary float-left" onclick="prevStep(3)">Previous</button>
            <button type="submit" class="btn btn-success float-right">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
@section('footer_script')
<script>

    let selectedName; // Variable to store the selected name

    function updateSelectedName() {
    selectedName = document.getElementById('name').value;
    }

    function nextStep(currentStep) {
        if (currentStep === 1) {
        // Set the selected name in the email input of the next step
        document.getElementById('email').value = selectedName;
      }
      $(`#step${currentStep}`).addClass('d-none');
      $(`#step${currentStep + 1}`).removeClass('d-none');
    }
  
    function prevStep(currentStep) {
      $(`#step${currentStep}`).addClass('d-none');
      $(`#step${currentStep - 1}`).removeClass('d-none');
    }
  </script>
@endsection --}}