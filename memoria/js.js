 let cartasViradas = [];  
        sessionStorage.setItem('vitorias', sessionStorage.getItem('vitorias'));
        sessionStorage.setItem('derrotas', sessionStorage.getItem('derrotas'));

        const vitorias = sessionStorage.getItem('vitorias');
        const derrotas = sessionStorage.getItem('derrotas');  
        if (sessionStorage.getItem('derrotas')>0)
            {document.getElementById('derrotas').textContent = sessionStorage.getItem('derrotas');}
        else{ sessionStorage.setItem('derrotas', 0);}
        if (sessionStorage.getItem('vitorias')>0)
            {document.getElementById('vitorias').textContent = sessionStorage.getItem('vitorias');}
        else{ sessionStorage.setItem('vitorias', 0);}
        let paresEncontrados = 0;
        let tentativas = 0;

        function virarCarta(id) {
            let carta = document.getElementById(id);
            if (cartasViradas.length < 2 && !carta.classList.contains('virada')) {
                carta.classList.add('virada');
                cartasViradas.push(carta);

                let imagens = carta.getElementsByTagName('img');
                for (let i = 0; i < imagens.length; i++) {
                    imagens[i].style.display = 'block';
                }

                if (cartasViradas.length === 2) {
                    let carta1 = cartasViradas[0];
                    let carta2 = cartasViradas[1];

                    let img1 = carta1.querySelector('img').getAttribute('src');
                    let img2 = carta2.querySelector('img').getAttribute('src');
                    tentativas++;

                    if (img1 === img2) {
                        cartasViradas = [];
                        paresEncontrados++;

                        if (paresEncontrados === 5) {
                            alert('Você ganhou! Todas as cartas foram encontradas em ' + tentativas + ' tentativas.');
                            sessionStorage.setItem('vitorias', parseInt(sessionStorage.getItem('vitorias'))+1);
                document.getElementById('vitorias').textContent = sessionStorage.getItem('vitorias');
                            reiniciarJogo();
                    }else{
                    if(tentativas === 10){
                       alert('Você perdeu! ultrapassou 10 tentativas '); 
                       reiniciarJogo();}}
                    } else {
                        if(tentativas === 10){
                       alert('Você perdeu! ultrapassou 10 tentativas '); 
                       reiniciarJogo();
                       sessionStorage.setItem('derrotas', parseInt(sessionStorage.getItem('derrotas'))+1);
                document.getElementById('derrotas').textContent = sessionStorage.getItem('derrotas');
                   }
                        setTimeout(function() {
                            carta1.classList.remove('virada');
                            carta2.classList.remove('virada');

                            let imagens1 = carta1.getElementsByTagName('img');
                            let imagens2 = carta2.getElementsByTagName('img');

                            for (let i = 0; i < imagens1.length; i++) {
                                imagens1[i].style.display = 'none';
                            }

                            for (let i = 0; i < imagens2.length; i++) {
                                imagens2[i].style.display = 'none';
                            }

                            cartasViradas = [];
                        }, 1000);
                        
                    }
                    document.getElementById('tentativas').textContent = tentativas;
                    
                }
            }
        }

        function reiniciarJogo() {
            if (tentativas>=1 && paresEncontrados !=5) {
                sessionStorage.setItem('derrotas', parseInt(sessionStorage.getItem('derrotas'))+1);
                document.getElementById('derrotas').textContent = sessionStorage.getItem('derrotas');
            }
            let cartas = document.querySelectorAll('.carta');
            for (let i = 0; i < cartas.length; i++) {
                cartas[i].classList.remove('virada');
                let imagens = cartas[i].getElementsByTagName('img');
                for (let j = 0; j < imagens.length; j++) {
                    imagens[j].style.display = 'none';
                }
            }
            cartasViradas = [];
            paresEncontrados = 0;
            tentativas = 0;
            document.getElementById('tentativas').textContent = tentativas;
            shuffleCartas();
        }

        function shuffleCartas() {
            let cartas = document.querySelectorAll('.carta');
            let tabuleiro = document.getElementById('tabuleiro');
            for (let i = cartas.length; i >= 0; i--) {
                tabuleiro.appendChild(cartas[Math.random() * i | 0]);
            }
        }

        let cartas = document.querySelectorAll('.carta');
        for (let i = 0; i < cartas.length; i++) {
            cartas[i].addEventListener('click', function() {
                virarCarta(this.id);
            });
        }

        shuffleCartas();