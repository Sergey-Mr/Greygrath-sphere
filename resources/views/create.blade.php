<form method="POST" action="{{ route('meals.store') }}">
    @csrf
    <div>
        <label for="date">Date</label>
        <input type="date" name="date" id="date" required>
    </div>
    <div>
        <label for="note">Note</label>
        <textarea name="note" id="note" required></textarea>
    </div>
    <button type="submit">Submit</button>
</form>