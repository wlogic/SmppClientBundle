Configuration
=============

    kronas_smpp_client:
        host: %smpp_host%                   # IP or FQDN
        port: %smpp_port%
        login: %smpp_login%
        password: %smpp_password%
        signature: %smpp_sigranure%
        signature: %smpp_sigranure%
        socket_timeout: %socket_timeout%    # Dafault: 10000 ms
        debug:
            transport: %debug_transport%    # Dafault: False
            smpp: %debug_smpp%              # Dafault: False