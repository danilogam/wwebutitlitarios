<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IpController extends Controller
{
    public function show(Request $request)
    {
        $ip = $this->getClientIp($request);

        $tipo = filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) ? 'IPv6' : 'IPv4';

        return view('meu-ip', compact('ip', 'tipo'));
    }

    /**
     * Captura o IP real do cliente, tentando vários cabeçalhos comuns.
     *
     * @param Request $request
     * @return string
     */
    private function getClientIp(Request $request): string
    {
        // Ordem recomendada: Cloudflare, X-Real-IP, X-Forwarded-For, HTTP_CLIENT_IP, fallback request->ip()
        $candidates = [
            $request->server('HTTP_CF_CONNECTING_IP'),      // Cloudflare
            $request->server('HTTP_X_REAL_IP'),             // X-Real-IP
            $request->server('HTTP_X_FORWARDED_FOR'),       // X-Forwarded-For (pode ser lista)
            $request->server('HTTP_CLIENT_IP'),
            $request->server('REMOTE_ADDR'),
            $request->ip(),                                 // último recurso
        ];

        foreach ($candidates as $ip) {
            if (empty($ip)) {
                continue;
            }

            // Se for lista (ex: "1.1.1.1, 2.2.2.2"), pegue o primeiro
            if (strpos($ip, ',') !== false) {
                $ip = trim(explode(',', $ip)[0]);
            } else {
                $ip = trim($ip);
            }

            // Valida IP (aceita IPv4 e IPv6)
            if (filter_var($ip, FILTER_VALIDATE_IP)) {
                return $ip;
            }
        }

        // fallback seguro
        return '127.0.0.1';
    }
}
