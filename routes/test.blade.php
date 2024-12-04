<table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Buyer Name</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Payment Status</th>
                                <th scope="col">Payment Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <td>{{ $payment->order->user->name }}</td>
                            <td>{{ $payment->order->product->name }}</td>
                            <td>{{ $payment->payment_status }}</td>
                            <td>{{ $payment->opayment_date }}</td>
                        </tbody>
                    </table>
