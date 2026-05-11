<?php
    require("../configs/conexaoboot.php");


    //Pega a mensagem do user por ajax
    $getMesg = mysqli_real_escape_string($mysqli, $_POST['text']);

    //Checando a consulta do user da BD
    $check_data = "SELECT respostas FROM chatboot WHERE perguntas LIKE '%$getMesg%'";
    $run_query = mysqli_query($mysqli, $check_data) or die("Erro");

    //Se a consulta estiver na BD então  mostre caso contrário vai para outra declaração no else
    if (mysqli_num_rows($run_query) > 0) {
        //Retorna da BD a consulta do user
        $fetch_data = mysqli_fetch_assoc($run_query);
        
        $replay = $fetch_data['respostas'];
        echo $replay;
            
        }elseif ($getMesg == 'Quero marcar uma consulta') {
                    
            $replay = 'Consulta marcada
                <a href="#data" class="btn btn-primary w-100" style="border-radius: 0 0 0 0;border: 1px solid #fff;" value="#data">Escolha</a>
            ';
            echo $replay;
        }elseif ($getMesg == 'Dor de cabeça' || $getMesg == 'dor de cabeça') {
            echo "Você pode estar com uma simples dor de cabeça. Tente descansar e beber água. Se persistir, consulte um médico.";
        } elseif ($getMesg == 'Febre' || $getMesg == 'febre') {
            echo "Pode ser um sinal de infecção. Se você tiver febre alta, calafrios ou outros sintomas graves, recomendo que você consulte um médico o mais rápido possível.";
        } elseif ($getMesg == 'Tosse' || $getMesg == 'tosse') {
            echo "A tosse pode ser causada por várias condições, incluindo resfriados, alergias ou problemas respiratórios. Se persistir, consulte um médico.";

        } 

        //  INICIO DA DOENÇA DE Gripe

        elseif ($getMesg == "Gripe" || $getMesg == "gripe") {
            $sintomas = 'Febre;<br>
                         Dor no corpo;<br>
                         Dores de cabeça;<br>
                         Sintomas respiratórios como tosse, congestão de vias aéreas (popularmente conhecido como nariz entupido) e dificuldade para respirar. <br>
                    
            ';
            echo "Sentes alguns desse sintómas?<br>".$sintomas."?<br>
                Responde com Sinto ou Não.
            ";
            } elseif ($getMesg == "Sintp" || $getMesg == "sinto") {
              $remedios_gripe = 'Paracetamol ou ibuprofeno;<br>
                                 MixaGripe;<br>
                                 Benegripe;<br>
                                 Fluimucil 100 mg/mL;<br>
                                 Acetilcisteína 40 mg/mL Genérico Aché;<br>
                    
            ';
            $medidas_acelerar_tratamento = 'Ficar de repouso;<br>
                                            Beber muito líquido;<br>
                                            Aumente a imunidade do ar. Deixe um balde com água no cômodo (ou se possível o uso de um aparelho umidifcado);<br>
                                            Evite ambientes fechados e sem ventilação.<br> 
                                            Tome a vacina. <br>
                    
            ';
                echo "Aqui apresenta alguns dos melhores remédios para gripe :<br><br>".$remedios_gripe."<br><br>

                    Além dos medicamentos recomendados acima, é importante adotar algumas medidas para acelerar o tratamento da gripe como: ".$medidas_acelerar_tratamento.".<br><br>
                Pretende saber mais  sobre os efeitos de cada remédio acima?<br>
                Responde digitando o nome de cada remédio.<br><br>
                
                Se possível marque uma consulta com um dos nossos especialistas na matéria.<br>
                    Caso queira marcar uma consulta digite Quero marcar uma consulta.<br><br>
                    Ou caso queira saber mais  sobre esta doença digite Saber mais sobre a Gripe.<br><br>

                    Ou se pretende fazer mais alguma pergunta sobre a doença?<br>
                    Responde com Sim pretendo ou Não pretendo.
                    ";

            }  elseif ($getMesg == "Não sinto" || $getMesg == "não sinto" || $getMesg == "Nao sinto" || $getMesg == "nao sinto") {
                echo "Possivelmente tenhas outro tipo de doença, tente escolher outras opções acima. obrigado!";
                
            } elseif ($getMesg == "Paracetamol ou ibuprofeno" || $getMesg == "Paracetamol" || $getMesg == "paracetamol" || $getMesg == "Ibuprofeno" || $getMesg == "ibuprofeno" || $getMesg == "paracetamol ou ibuprofeno") {
                    echo "Paracetamol ou ibuprofeno<br>
                    Na literatura médica, o paracetamol ou ibuprofeno é classificado como um anti-inflamatório não esteroidal. O medicamento é um analgésico, que alivia os desconfortos, e um antitérmico, ideal para o combater a febre. <br>

                        O fármaco é Isento de Prescrição (MIP) e, por isso, pode ser adquirido em farmácias e lojas virtuais, como a Memed, sem receita médica. <br> 

                            Apesar do acesso descomplicado, é fundamental consultar um médico para que ele avalie os sintomas e libere a composição.<br>

                        O medicamento funciona assim: o fármaco é absorvido pelo corpo e, durante o percurso, é direcionado para vários tecidos. Quando ele alcança o alvo, efetua a ação desejada e se transforma em um composto pronto para ser expelido do organismo, por meio da urina. <br>

                    O seu mecanismo de ação bloqueia os processos orgânicos que provocam a dor e a febre (enzima COX2, que têm papel importante nas inflamações). Geralmente, o efeito ocorre entre 15 a 30 minutos. <br>

                    Há várias manifestações que podem ser tratadas com o paracetamol. <br>

                    febre;<br>
                    dor nas costas;<br>
                    dor de cabeça;<br>
                    dor menstrual;<br>
                    dor de dente; <br>
                    dores causadas por resfriados e gripes; <br>
                    enxaqueca;  <br>
                    Tensões musculares.<br>
                    O medicamento contém algumas contraindicações para quem pode ou não tomar: <br> 

                alérgicos ao paracetamol 
                quem estiver tomando outros medicamentos que contenham paracetamol, para não haver superdosagem
                quem já tiver atingido o limite diário de consumo 
                bebês com menos de três meses de idade 
                Em alguns pacientes, a composição é até permitida, mas desde que seja liberada por um médico. <br>
                A orientação vale especialmente para: <br>

                grávidas;<br>
                crianças com menos de 12 anos de idade;<br>
                quem tem problemas de fígado; <br>
                quem tem problemas renais;<br>
                quem tem problemas com álcool;<br>
                fumantes;<br>
                quem está muito abaixo do peso.<br> 
                A preocupação não é exagerada, uma vez que o paracetamol pode causar diversas reações no paciente.<br> 

                reação alérgica;<br>
                erupções ou inchaço na pele;<br> 
                pele irritada; <br>
                doenças sanguíneas;<br> 
                danos ao fígado e rins, quando o consumo do paracetamol for maior do que as doses recomendadas.<br>
                No caso de algumas destas reações deve-se interromper o uso e procurar um médico o mais rápido possível.<br><br>

                    Se possível marque uma consulta com um dos nossos especialistas na matéria.<br>
                    Caso queira marcar uma consulta digite Quero marcar uma consulta.<br><br>
                    Ou caso queira saber mais  sobre esta doença digite Saber mais sobre a Gripe.<br><br>

                    Ou se pretende fazer mais alguma pergunta sobre a doença?<br>
                    Responde com Sim pretendo ou Não pretendo.
                    ";

            } elseif ($getMesg == "Benegripe" || $getMesg == "benegripe") {
                    echo "Para auxiliar o tratamento, tenha cuidado com a dose da composição:<br> 

                        a partir dos 12 anos de idade: a dose de 30 mL (uma tampa do copo dosador) é fixa,<br> 
                        crianças entre dois e 11 anos de idade: a dosagem é calculada conforme a idade e peso.<br> 
                        O site oficial do Benegrip informa que ele deve ser ingerido a cada seis horas, não sendo liberado um consumo superior a quatro vezes ao dia. Sem dúvidas é um dos melhores remédios para resfriado infantil,<br>

                        Ele também não é indicado para crianças com menos de dois anos de idade e em casos de alergia a algum dos componentes da fórmula.<br> 

                        O ideal é que a criança, se possível, seja avaliada pelo médico pediatra, antes de tomar o medicamento. <br><br>
                    Se possível marque uma consulta com um dos nossos especialistas na matéria.<br>
                    Caso queira marcar uma consulta digite Quero marcar uma consulta.<br><br>
                    Ou caso queira saber mais  sobre esta doença digite Saber mais sobre a Gripe.<br><br>

                    Ou se pretende fazer mais alguma pergunta sobre a doença?<br>
                    Responde com Sim pretendo ou Não pretendo.
                    ";

            } elseif ($getMesg == "Fluimucil 100 mg/mL" || $getMesg == "fluimucil 100 mg/mL") {
                    echo "Fluimucil é recomendado para tratamento de bronquite aguda, bronquite crônica, enfisema pulmonar, broncopneumonia e outros problemas respiratórios. Ele ajuda a eliminar o catarro e facilita a respiração, dois sintomas que prejudicam bastante o paciente com gripe.<br> 
                    Se possível marque uma consulta com um dos nossos especialistas na matéria.<br>
                    Caso queira marcar uma consulta digite Quero marcar uma consulta.<br><br>
                    Ou caso queira saber mais  sobre esta doença digite Saber mais sobre a Gripe.<br><br>

                    Ou se pretende fazer mais alguma pergunta sobre a doença?<br>
                    Responde com Sim pretendo ou Não pretendo.
                    ";

            } elseif ($getMesg == "Acetilcisteína 40 mg/mL Genérico Aché
                        " || $getMesg == "acetilcisteína 40 mg/mL Genérico Aché
                        ") {
                    echo "Trata-se de um medicamento expectorante (diluindo as secreções e facilitando sua eliminação) recomendado para os pacientes com dificuldade para expectorar e com acúmulo de secreção densa e viscosa, tais como: <br>

                        bronquite aguda;<br>
                        bronquite crônica e suas exacerbações (piora do quadro clínico e complicações);<br>
                        enfisema pulmonar (doença crônica caracterizada pelo comprometimento dos pulmões);<br>
                        pneumonia (inflamação nos pulmões e brônquios);<br>
                        colapso/atelectasias pulmonares (fechamento dos brônquios);<br> 
                        mucoviscidose (doença hereditária que produz muco espesso, também conhecida por fibrosecística);<br>
                        intoxicação acidental ou voluntária por paracetamol.<br><br>
                    Se possível marque uma consulta com um dos nossos especialistas na matéria.<br>
                    Caso queira marcar uma consulta digite Quero marcar uma consulta.<br><br>
                    Ou caso queira saber mais  sobre esta doença digite Saber mais sobre a Gripe.<br><br>

                    Ou se pretende fazer mais alguma pergunta sobre a doença?<br>
                    Responde com Sim pretendo ou Não pretendo.
                    ";

            } elseif ($getMesg == "Saber mais sobre a Gripe" || $getMesg == "saber mais sobre a gripe") {
                    echo "O que é a Gripe<br><br>
                        Trata-se de uma infecção viral provocada pelo vírus Influenza, que se manifesta com os seguintes sintomas:<br>

                            febre;<br>
                            dor no corpo;<br>
                            dores de cabeça;<br>
                            sintomas respiratórios como tosse, congestão de vias aéreas (popularmente conhecido como nariz entupido) e dificuldade para respirar.<br><br> 
                            Já em crianças, as crises de sibilância (“chiado no peito”) são as manifestações mais comuns. <br>

                            Os sinais podem ser leves ou intensos, podendo levar um paciente ao óbito dependendo do nível de agressão do vírus e, principalmente, do estado imunológico e nutricional do indivíduo, de acordo com a Sociedade Brasileira de Pediatria (SBP). <br>

                            Qual é a diferença entre gripe e resfriado?<br> 
                            resfriado: é provocado por diversos tipos de vírus que causam manifestações iguais a da gripe, porém, de forma menos intensa. Até agosto de 2022, não há uma vacina contra o resfriado, pois a variedade de vírus prejudica o desenvolvimento de um imunizante;<br> 
                            gripe: é causada por um vírus específico, o Influenza. Por isso, há prevenção. Como existem diversos subtipos (cepas), que passam por várias mutações, é ideal tomar uma dose anualmente, pois há a proteção contra novas cepas mais causadoras de gripe. O imunizante tem validade de 12 meses, o que exige um cuidado redobrado. <br><br>

                    Pretende fazer mais alguma pergunta sobre a doença?<br>
                    Responde com Sim pretendo ou Não pretendo.
                    
                    ";
            } elseif ($getMesg == "Sim pretendo" || $getMesg == "sim pretendo") {
                echo "Qual a sua questão?";
            } elseif ($getMesg == "Não pretendo" || $getMesg == "não pretendo" || $getMesg == "Nao pretendo" || $getMesg == "nao pretendo") {
                echo "Ok rápidas melhoras, muito obrigado e até mais.";
                echo "<script>window.location='../usuario_normal_modal.php'</script>";                

            
               /* die;
                exit;
                $getMesg->close();
                */


            }   // FIM DA DOENÇA DE Gripe


            //  INICIO DA DOENÇA DE Hipertensão arterial

        elseif ($getMesg == "Hipertensão arterial" || $getMesg == "hipertensão arterial") {
            $sintomas = 'Náuseas;<br>
                    Tontura;<br>
                    Dor de cabeça forte;<br>
                    Sangramento pelo nariz;<br>
                    Zumbido no ouvido;<br>
                    Dificuldade para respirar;<br>
                    Cansaço excessivo;<br>
                    Visão embaçada;<br>
                    Dor no peito;<br>
                    Perda da consciência;<br>
                    Ansiedade excessiva.<br>
                    
            ';
            echo "Sentes alguns desse sintómas?<br>".$sintomas."?<br>
                Responde com Sim ou Não.
            ";
            } elseif ($getMesg == "Sim" || $getMesg == "sim") {
              $Hipertensão_essencial = 'Hipertensão essencial :<br><br>
                                        Idade superior a 65 anos;<br>
                                        História familiar de hipertensão;<br>
                                        Sedentarismo;<br>
                                        Alimentação com excesso de sal;<br>
                                        Hábito de fumar.<br>
                    
            ';
            $Hipertensão_secundária = 'Hipertensão secundária : <br><br>
                                        Diabetes;<br>
                                        Obesidade;<br>
                                        Doença nos rins, como falência renal, glomerulonefrite ou pielonefrite;<br>
                                        Infecção crônica nos rins;<br>
                                        Defeitos congênitos no coração;<br>
                                        Tumor na glândula suprarrenal;<br>
                                        Hipo ou hipertireoidismo;<br>
                                        Apneia do sono.<br>
                    
            ';  
                echo "Podes identificar o tipo de Hipertensão com as suas casusas? <br><br>Será [1º] :".$Hipertensão_essencial. "?<br>ou [2º] :".$Hipertensão_secundária."? <br>
                Responde com uma das opções.";

            }  elseif ($getMesg == "Não" || $getMesg == "não" || $getMesg == "Nao" || $getMesg == "nao") {
                echo "Possivelmente tenhas outro tipo de doença, tente escolher outras opções acima. obrigado!";
                
            } elseif ($getMesg == "Hipertensão essencial" || $getMesg == "hipertensão essencial" || $getMesg == "1º" || $getMesg == "Primeiro" || $getMesg == "primeiro") {
                    echo "Este tipo de hipertensão pode também ser causada pelo estresse excessivo, podendo afetar pessoas de qualquer idade, até mesmo os mais jovens.<br>
                    Recomendo a praticar atividades físicas regularmente, evitar fumar e reduzir o consumo de sal<br>
                    Ou podes tomar alguns remédios anti-hipertensivos, como diuréticos ou beta-bloqueadores<br>
                    Se possível marque uma consulta com um dos nossos especialistas na matéria.<br><br>
                    Caso queira marcar uma consulta digite Quero marcar uma consulta.<br><br>
                    Ou caso queira saber mais  sobre esta doença digite Saber mais sobre a Hipertensão.<br><br>

                    Ou se pretende fazer mais alguma pergunta sobre a doença?<br>
                    Responde com Sim pretendo ou Não pretendo.
                    ";

            } elseif ($getMesg == "Hipertensão secundária" || $getMesg == "hipertensão secundária" || $getMesg == "2º" || $getMesg == "Segundo" || $getMesg == "segundo") {
                    echo "O consumo excessivo de bebidas alcoólicas, uso de drogas ou o uso de remédios corticoides ou anticoncepcionais orais, também podem causar hipertensão secundária.<br>
                        Marque uma consulta com um dos nossos especialistas na matéria para indicar o tratamento direcionado para corrigir a doença que causou a pressão alta.<br><br><br><br>
                    Caso queira marcar uma consulta digite Quero marcar uma consulta.<br><br>
                    Ou caso queira saber mais  sobre esta doença digite Saber mais sobre a Hipertensão.<br><br>

                    Ou se pretende fazer mais alguma pergunta sobre a doença?<br>
                    Responde com Sim pretendo ou Não pretendo.
                    ";

            } elseif ($getMesg == "Saber mais sobre a Hipertensão" || $getMesg == "saber mais sobre a hipertensão") {
                    echo "Hipertensão gestacional<br>
                        A hipertensão gestacional é uma condição grave da gestação, que pode ser causada por uma alimentação desequilibrada, obesidade, diabetes ou má formação da placenta. Além disso, também é mais frequente quando a primeira gravidez acontece após os 35     anos, por exemplo. <br>

                        A hipertensão gestacional normalmente é identificada no acompanhamento pré-natal e deve ser tratada rapidamente, para evitar o desenvolvimento de pré-eclâmpsia, que é uma situação grave e que pode colocar em risco a vida da mãe e do bebê.<br>

                    Possíveis complicações<br>
                    A hipertensão pode causar danos nas veias, artérias e nos órgãos, resultando em  complicações graves como: <br>

                        Infarto;<br>
                        AVC;<br>
                        Aneurisma;<br>
                        Insuficiência cardíaca;<br>
                        Arritmia;<br>
                        Angina de peito;<br>
                        Falência renal.<br>
                    <br>Além disso, a pressão alta também pode causar lesões nos olhos, levar a uma diminuição do fluxo sanguíneo para o cérebro e causar problemas de memória, dificuldade de aprendizado, ou até demência.<br>

                    Desta forma, é fundamental fazer o tratamento indicado pelo médico, pois quanto mais alta a pressão arterial e quanto mais tempo a pressão estiver descontrolada, maior o risco de complicações graves..<br><br>

                    Pretende fazer mais alguma pergunta sobre a doença?<br>
                    Responde com Sim pretendo ou Não pretendo.
                    
                    ";
            } elseif ($getMesg == "Sim pretendo" || $getMesg == "sim pretendo") {
                echo "Qual a sua questão?";
            } elseif ($getMesg == "Não pretendo" || $getMesg == "não pretendo" || $getMesg == "Nao pretendo" || $getMesg == "nao pretendo") {
                echo "Ok rápidas meljoras, muito obrigado e até mais.";
                die();
                exit();
            }
            // FIM DA DOENÇA DE Hipertensão arterial


        //  INICIO DA DOENÇA DE Infecção urinária

        elseif ($getMesg == "Infecção urinária" || $getMesg == "infecção urinária") {
            $sintomas = 'Ardência forte ao urinar<br>
                        Forte necessidade de urinar, mesmo tendo acabado de voltar do quarto de banho<br>
                        Urina escura<br>
                        Urina acompanhada de sangue<br>
                        Urina com cheiro muito forte<br>
                        Dor pélvica<br>
                        Dor no reto <br>
                        Aumento da frequência de micções<br>
                        Incontinência urinária. <br>
                    
            ';
            echo "Sentes alguns desse sintómas?<br>".$sintomas."?<br>
                Responde com Sim sinto ou Não.
            ";
            } elseif ($getMesg == "Sim sinto" || $getMesg == "sim sinto") {
              $remedios_caseiros_inf_urinaria = 'Chá de aroeira<br>
                                                    Cranberries<br>
                                                    Melancia<br>
                                                    Chá de manjericão<br>
                                                    Chá de carqueja.<br>
                    
            ';
            $remedios_mais_usados = 'Amicacina<br>
            Amoxicilina + Clavulanato de Potássio<br>Amozilina<br>Androfloxin<br>Bactrim<br>Ceclor<br>
            Cefaclor<br>Cefadroxila<br>Cefalexina<br>Cefalotina<br>Ceftriaxona Dissódica<br>
            Ceftriaxona Sódica<br>Cetoprofeno<br>Ciprofloxacino<br>Cefanaxil<br>Cipro<br>Clocef<br>
            Clordox<br>Cystex<br>Doxiciclina<br>Hincomox<br>Monuril<br>Nitrofen<br>
            Norfloxacino<br>Meropeném. <br>
                    
            ';
              $medidas_prevensao = 'Consuma, pelo menos, dois litros de água por dia;<br>
                            Limpe-se após urinar para evitar que bactérias se acumulem no local e entrem no trato urinário;<br>
                            Urine após relações sexuais para esvaziar a bexiga. O consumo de água também contribui para diluir a urina;<br>
                            Use absorventes externos em vez de internos, pois alguns especialistas acreditam que isso aumente a probabilidade de infecções. Troque de absorvente cada vez que for ao quarto de banho<br>
                            Não use ducha nem sprays ou pó para a higiene feminina, especialmente aqueles que contenham perfume;<br>
                            Evite usar calças muito apertadas;<br>
                            Use calcinha e meia-calça de algodão e troque-as, pelo menos, uma vez por dia.<br>
                    
            ';
                echo "O tratamento de infecções urinárias varia de acordo com o tipo de cada infecção, a frequência com que o paciente apresenta quadros infecciosos e sua gravidade.<br> Normalmente, ele é feito a partir da administração de medicamentos antibióticos. O especialista também poderá receitar o uso de analgésicos para aliviar os sintomas de dor e a ardência ao urinar.<br><br>
                Também é essencial que o paciente adote alguns hábitos, como beber bastante água, não segurar o xixi e esvaziar completamente a bexiga cada vez que for urinar.<br>
                Aqui apresenta alguns dos melhores remédios para o tratamento caseiro para infecção urinária com chás :<br><br>".$remedios_caseiros_inf_urinaria."<br><br>

                Aqui apresenta alguns dos melhores remédios para o tratamento caseiro para infecção urinária com chás :<br><br>".$remedios_caseiros_inf_urinaria."<br><br>
                Aqui apresenta algumas medidas que podem ajudar a prevenir o surgimento de infecções urinárias :<br> ".$medidas_prevensao.".<br><br>

                Se possível marque uma consulta com um dos nossos especialistas na matéria.<br>
                    Caso queira marcar uma consulta digite Quero marcar uma consulta.<br><br>
                
                Ou caso queira saber mais  sobre esta doença digite Saber mais sobre a Infecção urinária.<br><br>

                    Ou se pretende fazer mais alguma pergunta sobre a doença?<br>
                    Responde com Sim pretendo ou Não pretendo.
                    ";

            }  elseif ($getMesg == "Não" || $getMesg == "não" || $getMesg == "Nao" || $getMesg == "nao") {
                echo "Possivelmente tenhas outro tipo de doença, tente escolher outras opções acima. obrigado!";
                
            } elseif ($getMesg == "Saber mais sobre a Infecção urinária" || $getMesg == "saber mais sobre a infecção urinária") {
                    echo "A infecção urinária, também conhecida como infecção do trato urinário, é uma doença infecciosa causada por micro-organismos, especialmente bactérias e fungos, que pode acometer qualquer parte do sistema urinário, como rins, ureteres, bexiga e uretra. Mais comum em mulheres, o problema apresenta sintomas como ardência ao urinar, incontinência urinária e sensação de pressão na barriga.<br>

                            Tipos<br>
                        Os tipos, causas e sintomas das infecções urinárias variam de acordo com o local onde há infecção. Ela  é dividida em diferentes tipos, sendo eles: <br>

                        Cistite: é uma infecção bacteriana na bexiga ou no trato urinário inferior. Ela é, na maioria das vezes, causada pela proliferação da Escherichia coli. A relação sexual também pode levar à cistite, mas você não precisa ser sexualmente ativa para desenvolvê-la <br>
                        Uretrite: consiste na inflamação ou infecção da uretra, o canal que transporta a urina da bexiga para fora do corpo. As uretrites são decorrentes de bactérias provenientes do trato gastrointestinal, mas pelo fato da uretra nas mulheres estar mais próxima da vagina, algumas infecções como herpes, gonorreia e infecção por clamídia podem levar à uretrite <br>
                        Pielonefrite: é um tipo de infecção do trato urinário que geralmente começa na uretra ou na bexiga e viaja para um ou ambos os rim. Se não for tratada adequadamente, essa infecção renal pode prejudicar permanentemente seus rins ou a bactéria pode se espalhar para a corrente sanguínea e causar uma infecção potencialmente fatal<br>
                        Infecção nos ureteres: é uma infecção que afeta os tubos responsáveis por propelir a urina dos rins até a bexiga <br><br>
                         Diagnóstico<br>
                            O diagnóstico de infecção urinária é clínico deve ser realizado por um médico através dos seguintes exames: <br>

                            Exame de urina: é o método mais frequente usado para realizar o diagnóstico. O resultado fica pronto em torno de duas horas. A urina é analisada a procura de leucócitos (glóbulos brancos, que quando estão em níveis acima do normal representam um quadro infeccioso) e traços de sangue.<br>
                            Cultura de urina: uma análise de urina feita em laboratório geralmente é seguida de uma cultura de urina, em que o médico usará a amostra do paciente para cultivar a bactéria causadora em laboratório. Esse exame ajuda a identificar a bactéria e quais medicamentos são mais eficazes na ação contra ela<br>
                            Exames de imagem: o médico também poderá optar por realizar uma tomografia, um ultrassom ou uma ressonância magnética para identificar possíveis anormalidades em seu trato urinário. O especialista também pode solicitar o exame com utilização de contraste para destacar as partes do sistema urinário que apresentam problemas.<br>
                            Cistoscopia: é usada para analisar as partes internas da bexiga e da uretra a fim de identificar a causa da infecção.<br>
                            Em casos de infecções é necessário realizar exames radiológicos, como tomografia ou até ressonância magnética para melhor avaliar a gravidade e a presença de fatores agravantes da infecção urinária.<br>

                            Fatores de risco<br><br>
                            Diversos fatores podem aumentar o risco de infecção urinária, como ter um sistema imunológico enfraquecido (devido ao tratamento de câncer, por exemplo), problemas na bexiga que impedem o esvaziamento inadequado ou a presença de infecção na corrente sanguínea. <br>

                            Além disso, destaca-se que a presença de infecções mais comuns em pessoas cuja uretra é menor — como no caso do sistema reprodutor feminino. Por isso, embora não seja uma doença restrita a esse grupo, ele apresenta 50 vezes mais chances de ter infecção urinária. Sua incidência é muito comum, especialmente, durante a gravidez. <br>

                            No período, as alterações fisiológicas favorecem a colonização do trato urinário por bactérias e fungos. Alterações metabólicas e endócrinas, além de outras infecções vaginais, também podem ser fatores de risco para o desenvolvimento da infecção em gestantes. <br><br>
                            Complicações possíveis<br>
                                Se não for tratada, uma infecção urinária pode causar complicações mais graves, como:<br>

                                Infecções recorrentes, especialmente em mulheres que já apresentaram três ou mais infecções<br>
                                Danos permanentes aos rins<br>
                                O risco de infecção do sangue com risco de vida (sepse) é maior para crianças, idosos e aqueles cujos organismos não conseguem lutar contra as infecções (por exemplo, devido ao HIV ou à quimioterapia para o câncer)<br>
                                Aumento no risco de grávidas darem luz a bebês abaixo do peso normal ou prematuros<br>
                                Infecção geral<br>
                                Morte<br>


                    Pretende fazer mais alguma pergunta sobre a doença?<br>
                    Responde com Sim pretendo ou Não pretendo.
                    
                    ";
            } elseif ($getMesg == "Sim pretendo" || $getMesg == "sim pretendo") {
                echo "Qual a sua questão?";
            } elseif ($getMesg == "Não pretendo" || $getMesg == "não pretendo" || $getMesg == "Nao pretendo" || $getMesg == "nao pretendo") {
                echo "Ok rápidas meljoras, muito obrigado e até mais.";
                echo "<script>window.location='../usuario_normal_modal.php'</script>";                

               /* header("Locale: ../usuario_normal1.php");
                die();
                exit();*/
            }   // FIM DA DOENÇA DE Infecção urinária


        else{
            echo "Desculpe, não consegui entender sua pergunta. Por favor, reformule.";
        }
    
?>