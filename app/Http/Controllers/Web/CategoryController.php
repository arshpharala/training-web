<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Models\Catalog\Category;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    function index()
    {

        return 'Welcome';
    }
    function show($slug)
    {

        $category = Category::with('translation', 'topics.translation', 'topics.courses.translation')->where('slug', $slug)->first();

        $data['category'] = $category;

        $data['banner'] = $this->getBanner($slug);

        // return $category;
        return view('theme.xacademia.catalog.categories.show', $data);
    }


    function getBanner($slug)
    {

        if ($slug == 'it-foundations-and-tech-support') {

            $data['notes'] = [
                "[Track] IT Foundations > Tech Support Essentials",
                "[Topic] Hardware diagnostics: POST, SMART, and beep codes",
                "Tip: Start with user story. What changed since it last worked",
                "CLI: ipconfig /all  |  ping 8.8.8.8  |  tracert",
                "Network triage order: link > DHCP > DNS > routing",
                "Windows: Event Viewer > System > filter Critical + Error",
                "Linux: journalctl -p err -b 0",
                "Ticket hygiene: repro steps, environment, expected vs actual",
                "Golden images and rollback points reduce MTTR",
                "Security note: never ask for full passwords in tickets",
                "> Lab: Simulate DHCP failure on VLAN 20 and recover",
                "Assessment: 5 live faults in 30 minutes. Focus on clarity"
            ];

            $data['title'] = 'Learn smarter. <span class="text-warning">Upskill faster.';
            $data['intro'] = 'Personal training with a dedicated expert. Flexible scheduling including weekends. Real scenarios and guided practice that match daily work.';
            $data['notesHeading'] = 'Trainer Notes • Learning Tracks • Live Feed';
        } elseif ($slug == 'cloud-computing-and-devops') {
            $data['notes'] = [
                "[Track] Cyber Defense > Session start (lab)",
                "whois lab-target.local  # recon - lab only",
                "dig lab-target.local ANY +noall +answer",
                "nmap -sV -Pn <lab-ip> --top-ports 200  # service/version scan",
                "gobuster dir -u https://lab-app.local -w /wordlists/common.txt -t 20",
                "nikto -h https://lab-app.local",
                "wpscan --url https://lab-wp.local --enumerate u  # wordpress enumeration (lab)",
                "semgrep --config=p/owasp-top-ten ./webapp/",
                "trivy image registry.lab/myapp:latest  # container scan",
                "bandit -r ./python-app/  # static scan",
                "jq '.event.category' edr-alert.json | sort | uniq -c",
                "splunk search \"index=security action=blocked\" | stats count by src_ip",
                "tshark -r capture.pcap -Y \"http.request\" -T fields -e http.host -e http.request.uri | head -n 30",
                "zeek -r capture.pcap",
                "volatility -f memdump.raw --profile=Win7x64 pslist",
                "volatility -f memdump.raw malfind | head -n 30",
                "fls -r -m / diskimage.dd > bodyfile.txt",
                "log2timeline.py timeline.dump /mnt/evidence/diskimage.dd",
                "hashdeep -rl /mnt/evidence > hashes.baseline.txt",
                "yara -r rules/training_rules.yar ./suspicious_folder/",
                "strings suspicious.exe | grep -i 'http' | head -n 20",
                "mitmproxy --mode regular -p 8080  # proxy for traffic inspection (lab)",
                "mitmproxy -r capture.pcap  # replay and inspect",
                "curl -sS --head https://lab-app.local | sed -n '1,8p'",
                "gcloud projects get-iam-policy lab-project",
                "aws iam get-account-authorization-details --profile lab  # account audit",
                "az security alert list --query \"[?properties.state=='Active']\"",
                "kubectl get pods -A -o wide --context=lab-cluster",
                "kubectl describe networkpolicy default -n lab  # check network policy",
                "terraform init && terraform plan -var='env=training'  # IaC dry-run",
                "ansible-playbook -i inventory lab-playbook.yml --check",
                "theHarvester -d lab-target.local -b all  # email/subdomain OSINT",
                "sublist3r -d lab-target.local  # subdomain enumeration",
                "exiftool leaked_image.jpg  # metadata check",
                "# IR: isolate host, collect memory (winpmem), acquire disk image, record chain-of-custody",
                "> Assessment: Draft SOC escalation playbook and map TTPs to MITRE ATT&CK"
            ];


            $data['title'] = 'Build resilient cloud skills. <span class="text-warning">Ship faster with confidence.';
            $data['intro'] = 'Hands-on, mentor-led labs across AWS, Azure, and Google Cloud. Learn Kubernetes, Terraform, CI/CD, and FinOps the practical way.';
            $data['notesHeading'] = 'Trainer Notes • Cloud CLI • Live Feed';
        } elseif ($slug === 'ai-data-and-analytics') {

            $data['notes'] = [
                "[Track] AI & Data > Lab start",
                "conda create -n ai-lab python=3.11 -y && conda activate ai-lab",
                "pip install torch torchvision torchaudio --index-url https://download.pytorch.org/whl/cpu",
                "python -c \"import torch;print(torch.__version__)\"",
                "pip install tensorflow transformers datasets accelerate",
                "python train.py --epochs 5 --lr 3e-4 --batch-size 32",
                "mlflow run . -P lr=0.0003 -P epochs=5",
                "tensorboard --logdir runs/",
                "python -m venv venv && source venv/bin/activate",
                "python feature_engineering.py --input data/raw.csv --output data/clean.parquet",
                "dbt run --project-dir ./analytics",
                "az synapse workspace list",
                "gcloud bigquery datasets list",
                "databricks fs ls dbfs:/mnt/raw-data",
                "snowflake -q 'SHOW DATABASES;'",
                'psql $DSN -c "SELECT COUNT(*) FROM sales;"',
                "docker build -t ai-model:latest . && docker run -p 8080:8080 ai-model:latest",
                "torchserve --start --ncs --model-store model_store --models resnet=resnet.mar",
                "kubectl create ns ml && kubectl -n ml apply -f k8s/model-deploy.yaml",
                "kubectl -n ml get pods -o wide",
                "prometheus --config.file=prometheus.yml",
                "grafana-server --homepath /usr/share/grafana",
                "great_expectations checkpoint run ge_sales_checkpoint",
                "mlflow models serve -m runs:/12345abcdef/model -p 5001",
                "weaviate --host localhost:8080",
                "faiss-search --db vectors.faiss --query 'risk management'",
                "rag-pipeline --doc data/policy.pdf --question 'Top risks?'",
                "prefect deployment run flows/etl#daily_ingest",
                "airflow dags trigger etl_daily",
                "spark-submit --master local[4] jobs/spark_etl.py",
                "ksql -e 'SHOW STREAMS;'",
                "> Exercise: Build a Power BI dashboard from the cleaned dataset",
                "> Challenge: Deploy an LLM API with monitoring & rate limits"
            ];


            $data['title'] = 'Learn to command AI, <span class="text-warning">not be replaced by it.';
            $data['intro'] = 'Hands-on skills across AI, ML, data engineering, BI, and analytics. From models to pipelines, get job-ready.';
            $data['notesHeading'] = 'Trainer Notes • AI CLI • Live Feed';
        } elseif ($slug ==  'cybersecurity-and-ethical-hacking') {
            $data['notes'] = [
                "[Track] Cyber Defense > Session start (lab)",
                "whois lab-target.local  # recon - lab only",
                "dig lab-target.local ANY +noall +answer",
                "nmap -sV -Pn <lab-ip> --top-ports 200  # service/version scan",
                "gobuster dir -u https://lab-app.local -w /wordlists/common.txt -t 20",
                "nikto -h https://lab-app.local",
                "wpscan --url https://lab-wp.local --enumerate u  # wordpress enumeration (lab)",
                "semgrep --config=p/owasp-top-ten ./webapp/",
                "trivy image registry.lab/myapp:latest  # container scan",
                "bandit -r ./python-app/  # static scan",
                "jq '.event.category' edr-alert.json | sort | uniq -c",
                "splunk search \"index=security action=blocked\" | stats count by src_ip",
                "tshark -r capture.pcap -Y \"http.request\" -T fields -e http.host -e http.request.uri | head -n 30",
                "zeek -r capture.pcap",
                "volatility -f memdump.raw --profile=Win7x64 pslist",
                "volatility -f memdump.raw malfind | head -n 30",
                "fls -r -m / diskimage.dd > bodyfile.txt",
                "log2timeline.py timeline.dump /mnt/evidence/diskimage.dd",
                "hashdeep -rl /mnt/evidence > hashes.baseline.txt",
                "yara -r rules/training_rules.yar ./suspicious_folder/",
                "strings suspicious.exe | grep -i 'http' | head -n 20",
                "mitmproxy --mode regular -p 8080  # proxy for traffic inspection (lab)",
                "mitmproxy -r capture.pcap  # replay and inspect",
                "curl -sS --head https://lab-app.local | sed -n '1,8p'",
                "gcloud projects get-iam-policy lab-project",
                "aws iam get-account-authorization-details --profile lab  # account audit",
                "az security alert list --query \"[?properties.state=='Active']\"",
                "kubectl get pods -A -o wide --context=lab-cluster",
                "kubectl describe networkpolicy default -n lab  # check network policy",
                "terraform init && terraform plan -var='env=training'  # IaC dry-run",
                "ansible-playbook -i inventory lab-playbook.yml --check",
                "theHarvester -d lab-target.local -b all  # email/subdomain OSINT",
                "sublist3r -d lab-target.local  # subdomain enumeration",
                "exiftool leaked_image.jpg  # metadata check",
                "# IR: isolate host, collect memory (winpmem), acquire disk image, record chain-of-custody",
                "> Assessment: Draft SOC escalation playbook and map TTPs to MITRE ATT&CK"
            ];

            $data['title'] = 'Defend like a pro, <span class="text-warning">from SOC analyst to global CISO.';
            $data['intro'] = 'Hands-on labs and attack simulations covering ethical hacking, SOC ops, forensics, governance, and OSINT. Learn to secure and defend in real-world scenarios.';
            $data['notesHeading'] = 'Trainer Notes • Cyber CLI • Live Feed';

        } else {

            $data['title'] = 'Learn smarter, <span class="text-warning">Upskill faster.';
            $data['intro'] = $category->translation->short_description ??
                'Personal training with a dedicated expert. Flexible scheduling including weekends. Real scenarios and guided practice that match daily work.';
            $data['notesHeading'] = 'Trainer Notes • Cloud CLI • Live Feed';
            $data['notes'] = '';
        }

        return $data;
    }
}
