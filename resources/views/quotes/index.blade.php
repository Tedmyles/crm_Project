@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Quotes</h1>

        <!-- Button to add a new quote -->
        <a href="{{ route('quotes.create') }}" class="btn btn-primary mb-3">Add New Quote</a>

        <!-- Table to display list of quotes -->
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Deal ID</th>
                    <th>Account ID</th>
                    <th>Contact ID</th>
                    <th>Quote Date</th>
                    <th>Expiry Date</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($quotes as $quote)
                <tr>
                    <td>{{ $quote->id }}</td>
                    <td>{{ $quote->deal_id }}</td>
                    <td>{{ $quote->account_id }}</td>
                    <td>{{ $quote->contact_id }}</td>
                    <td>{{ $quote->quote_date }}</td>
                    <td>{{ $quote->expiry_date }}</td>
                    <td>{{ $quote->total }}</td>
                    <td>{{ $quote->status }}</td>
                    <td>
                        <!-- Button to view the quote -->
                        <a href="{{ route('quotes.show', $quote->id) }}" class="btn btn-sm btn-primary">View</a>
                        
                        <!-- Button to edit the quote -->
                        <a href="{{ route('quotes.edit', $quote->id) }}" class="btn btn-sm btn-success">Edit</a>
                        
                        <!-- Form to delete the quote -->
                        <form action="{{ route('quotes.destroy', $quote->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this quote?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
