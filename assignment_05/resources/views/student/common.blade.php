<div class="form-group">
    <label for="">Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="" placeholder="name" name="name" value="{{ (!empty($student)) ? $student->name : old('name') }}">
    @error('name')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="">Major</label>
    <select name="major_id" required class="form-control @error('major_id') is-invalid @enderror" value="">
        @error('major_id')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        @foreach($majors as $major)
        <option value="{{ $major->id }}">{{ $major->name }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="">Phone</label>
    <input type="number" class="form-control @error('phone') is-invalid @enderror" id="" placeholder="09***********" name="phone" value="{{ (!empty($student)) ? $student->phone : old('phone') }}">
    @error('phone')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="">Email</label>
    <input type="text" class="form-control @error('email') is-invalid @enderror" id="" placeholder="name@example.com" name="email" value="{{ (!empty($student)) ? $student->email : old('email') }}">
    @error('email')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="">Address</label>
    <textarea class="form-control @error('address') is-invalid @enderror" id="" name="address" value="">{{ (!empty($student)) ? $student->address : old('address') }}</textarea>
    @error('address')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
