<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MysqlScriptConverter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserPaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user_payments = (new MysqlScriptConverter('json_db/sb_userPayment.json'))->generate();
        // dd($user_payments);
        foreach ($user_payments as $user_payment) {
        //    dd($user_payment['location_id']);
            // DB::table('user_payments')->insert($user_payment);
            $agentdocument = []; // for agent_documentss table creation
            if ($user_payment['agent_doc']) {
                $agentdoc = json_decode($user_payment['agent_doc'], true);
            }
            unset($user_payment['agent_doc']);
            DB::table('user_payments')->insert($user_payment);
            $formatdocuments = $this->formatdocuments($agentdoc, $user_payment['id']);
            foreach ($formatdocuments as $document) {
                DB::table('agent_documents')->insert($document);
            }
        }
    }
    protected function formatdocuments($array, $paymentId)
    {
        foreach ($array as &$item) {
            foreach ($item as $key => $value) {
                $item['user_payment_id'] = $paymentId;
                $newKey = $this->camelToSnakeCase($key);
                if (isset($value['$numberInt'])) {
                    $item[$newKey] = (int)$value['$numberInt'];
                } elseif (isset($value['$numberDouble'])) {
                    $item[$newKey] = (float)$value['$numberDouble'];
                } else {
                    $item[$newKey] = $value;
                }
                if ($newKey !== $key) {
                    unset($item[$key]);
                }
            }
        }
        return $array;
    }
    public function camelToSnakeCase($camelCase)
    {
        $result = '';
        for ($i = 0; $i < strlen($camelCase); $i++) {
            $char = $camelCase[$i];
            if (ctype_upper($char)) {
                $result .= '_' . strtolower($char);
            } else {
                $result .= $char;
            }
        }
        return ltrim($result, '_');
    }
}
