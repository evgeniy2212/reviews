@extends('profile.index')

@section('profile_review_content')
    <div class="profile-review-place">
        <div class="adminFilters">
            <div class="adminFilterItem">
                <div>
                    Select year
                </div>
                <div>
                    <select class="select admin-data-filter-select"
                            id="filter-year"
                            name="year">
                        @foreach(\App\Services\DataService::getDataYearsFilter() as $year)
                            <option value="{!! $year !!}"
                                    {{ (array_key_exists('year', $currentFilter) && $currentFilter['year'] == $year)
                                        ? 'selected'
                                        : ''}}
                            >
                                {!! $year !!}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div style="height: 100%" class="d-flex justify-content-center align-items-stretch">
            <table border="1" style="table-layout: fixed;width: 100%;text-align: center;font-size: 0.9rem">
                <tr>
                    <th>{{ $currentFilter['year'] }}</th>
                    <th colspan="2">Users</th>
                    <th colspan="2">Persons</th>
                    <th colspan="2">Companies</th>
                    <th colspan="2">Goods</th>
                    <th colspan="2">Vacations</th>
                    <th colspan="2">Congratulations</th>
                </tr>
                <tr>
                    <td>Month</td>
                    <td>quantity</td><td>%</td>
                    <td>quantity</td><td>%</td>
                    <td>quantity</td><td>%</td>
                    <td>quantity</td><td>%</td>
                    <td>quantity</td><td>%</td>
                    <td>quantity</td><td>%</td>
                </tr>
                @for($i=1;$i<=12;$i++)
                    <tr>
                        <td>{{ \Carbon\Carbon::create()->month($i)->format('M') }}</td>
                        <td>+{{ $data['users'][$i]['count'] }}</td><td>+{{ $data['users'][$i]['percent'] }}</td>
                        <td>+{{ $data['persons'][$i]['count'] }}</td><td>+{{ $data['persons'][$i]['percent'] }}</td>
                        <td>+{{ $data['companies'][$i]['count'] }}</td><td>+{{ $data['companies'][$i]['percent'] }}</td>
                        <td>+{{ $data['goods'][$i]['count'] }}</td><td>+{{ $data['goods'][$i]['percent'] }}</td>
                        <td>+{{ $data['vacations'][$i]['count'] }}</td><td>+{{ $data['vacations'][$i]['percent'] }}</td>
                        <td>+{{ $data['congratulations'][$i]['count'] }}</td><td>+{{ $data['congratulations'][$i]['percent'] }}</td>
                    </tr>
                @endfor
                <tr>
                    <td>Total</td>
                    <td>{{ $data['users']['total']['total_count'] }}</td><td>+{{ $data['users']['total']['total_percent'] }}</td>
                    <td>{{ $data['persons']['total']['total_count'] }}</td><td>+{{ $data['persons']['total']['total_percent'] }}</td>
                    <td>{{ $data['companies']['total']['total_count'] }}</td><td>+{{ $data['companies']['total']['total_percent'] }}</td>
                    <td>{{ $data['goods']['total']['total_count'] }}</td><td>+{{ $data['goods']['total']['total_percent'] }}</td>
                    <td>{{ $data['vacations']['total']['total_count'] }}</td><td>+{{ $data['vacations']['total']['total_percent'] }}</td>
                    <td>{{ $data['congratulations']['total']['total_count'] }}</td><td>+{{ $data['congratulations']['total']['total_percent'] }}</td>
                </tr>
            </table>
        </div>
    </div>
@endsection
