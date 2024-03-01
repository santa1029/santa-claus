       $file_path = 'statements-year/'.bin2hex(random_bytes(16)).'.pdf';
        Storage::disk('public')->put($file_path, $pdfContent);
        $account_id = $id;
        $statement = new Statement;
        $statement->account_id = $id;
        $statement->date = $year.'-'.$month.'-'.$date;
        $statement->pdf = $account_id;
        $statement->save();

        // $new_statement = Statement::where('account_id', $id)->with('account')->first();

        $pdfPath = storage_path('app/public/'.$file_path);

        // setTimeout(function() {
        //     return response()->file($pdfPath);
        // }, 10000);
